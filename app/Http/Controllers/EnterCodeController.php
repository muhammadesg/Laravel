<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginCodeMail;

class EnterCodeController extends Controller
{
    public function showCodeForm()
    {
        $code = session('login_code'); // Получаем сохраненный в сессии код
        return view('Auth.enter-code', compact('code'));
    }

    public function sendCode(Request $request)
    {
        $user = Auth::user();
        $code = rand(1000, 9999);

        $request->session()->put('login_code', $code);

        Mail::to($user->email)->send(new LoginCodeMail($code));

        return redirect()->route('enter-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code.*' => ['required', 'digits:1'],
        ]);

        $user = Auth::user();
        $code = implode('', $request->input('code'));

        if ($code == session('login_code')) {
            // Код верный, вход выполнен успешно
            session()->forget('login_code'); // Очистка сессии от кода

            // Пометить пользователя как верифицированного
            $user->markEmailAsVerified();

            return redirect('/dashboard'); // Измените на ваш роут dashboard
        }

        return back()->withErrors(['code' => 'Invalid code'])->withInput();
    }

    public function dashboard()
    {
        return view('admin.index');
    }

}
