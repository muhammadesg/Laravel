<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        $username = $request->input('username');
        $message = $request->input('message');
        $date = $request->input('date');
        $uuid = (string) $request->input('uuid');

        $imagePath = null;
        $audioPath = ''; // Заменим NULL на пустую строку

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('uploads', $image->getClientOriginalName(), 'public');
        } else {
            $imagePath = ''; // Если изображение не загружено, устанавливаем значение в null или пустую строку, в зависимости от требований вашего приложения.
        }

        // Обработка аудио
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $audioPath = $audio->storeAs('uploads', uniqid() . '.' .  $audio->getClientOriginalName(), 'public');
        } else {
            $audioPath = ''; // Если аудио не загружено, устанавливаем значение в null или пустую строку, в зависимости от требований вашего приложения.
        }

        if ($request->input('message')) {
            $message = $request->input('message');
        } else {
            $message = ''; // Если аудио не загружено, устанавливаем значение в null или пустую строку, в зависимости от требований вашего приложения.
        }

        event(new Message($username, $message, $date, $imagePath ?: '', $audioPath ?: '', false, $uuid));

        return response()->json(['status' => 'success']);
    }


    public function markAsRead(Request $request)
    {
        $uuid = $request->input('uuid');

        // Проверяем, что `uuid` является допустимым UUID
        if ($uuid) {
            return response()->json(['status' => 'error', 'message' => 'Invalid UUID', 'debug' => 'Invalid UUID']);
        }

        // Находим сообщение в базе данных по UUID
        $message = Message::where('uuid', $uuid)->first();

        if (!$message) {
            return response()->json(['status' => 'error', 'message' => 'Message not found', 'debug' => 'Message not found']);
        }

        // Обновляем значение поля `read_by`
        $message->read = true;
        $message->save();

        return response()->json(['status' => 'success', 'debug' => 'Marked as read']);
    }


    public function index() {
        return view('admin.Chat.index');
    }
}

