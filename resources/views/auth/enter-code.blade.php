<!-- Разметка для resources/views/auth/enter-code.blade.php -->



@if(isset($showCode) && $showCode)
<p>Code received: {{ $code }}</p>
@else
    <style>
        .form__inner {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
            .form {
                width: 290px;
                height: 400px;
                display: flex;
                flex-direction: column;
                border-radius: 15px;
                background-color: white;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                transition: .4s ease-in-out;
            }

            .form:hover {
                box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
                scale: 0.99;
            }

            .heading {
                position: relative;
                text-align: center;
                color: black;
                top: 3em;
                font-weight: bold;
            }

            .check {
                position: relative;
                align-self: center;
                top: 4em;
            }

            .input {
                position: relative;
                width: 2.5em;
                height: 2.5em;
                margin: 1em;
                border-radius: 5px;
                border: none;
                outline: none;
                background-color: rgb(235, 235, 235);
                box-shadow: inset 3px 3px 6px #d1d1d1,
                            inset -3px -3px 6px #ffffff;
                top: 6.5em;
                left: 1.5em;
                padding-left: 15px;
                transition: .4s ease-in-out;
            }

            .input:hover {
                box-shadow: inset 0px 0px 0px #d1d1d1,
                            inset 0px 0px 0px #ffffff;
                background-color: lightgrey;
            }

            .input:focus {
                box-shadow: inset 0px 0px 0px #d1d1d1,
                            inset 0px 0px 0px #ffffff;
                background-color: lightgrey;
            }

            .btn1 {
                position: relative;
                cursor: pointer;
                top: 8em;
                left: 2.4em;
                width: 17em;
                height: 3em;
                border-radius: 5px;
                border: none;
                outline: none;
                transition: .4s ease-in-out;
                box-shadow: 1px 1px 3px #b5b5b5,
                            -1px -1px 3px #ffffff;
            }

            .btn1:active {
                box-shadow: inset 3px 3px 6px #b5b5b5,
                            inset -3px -3px 6px #ffffff;
            }

            .btn2 {
                position: relative;
                cursor: pointer;
                top: 8em;
                left: 2em;
                width: 14.2em;
                height: 2.5em;
                border-radius: 5px;
                border: none;
                outline: none;
                transition: .4s ease-in-out;
                box-shadow: 1px 1px 3px #b5b5b5,
                            -1px -1px 3px #ffffff;

                display: flex;
                align-items: center;
                justify-content: center;
                background: #f0f0f0;
                text-decoration: none;
                color: #000
            }

            .btn2:active {
                box-shadow: inset 3px 3px 6px #b5b5b5,
                        inset -3px -3px 6px #ffffff;
            }
    </style>


    <div class="form__inner">
        <form class="form" method="POST" action="{{ route('verify-code') }}">
            @csrf
            <p class="heading">Verify</p>
            <svg class="check" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" xml:space="preserve">  <image id="image0" width="60" height="60" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAQAAACQ9RH5AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
          AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
          cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0NDzN/r+StAAACR0lEQVRYw+3Yy2sTURTH8W+bNgVf
          aGhFaxNiAoJou3FVEUQE1yL031BEROjCnf4PLlxILZSGYncuiiC48AEKxghaNGiliAojiBWZNnNd
          xDza3pl77jyCyPzO8ubcT85wmUkG0qT539In+MwgoxQoUqDAKDn2kSNLlp3AGi4uDt9xWOUTK3xg
          hVU2wsIZSkxwnHHGKZOxHKfBe6rUqFGlTkPaVmKGn6iYao1ZyhK2zJfY0FZ9ldBzsbMKxZwZjn/e
          5szGw6UsD5I0W6T+hBhjUjiF7bNInjz37Ruj3igGABjbtpIo3GIh30u4ww5wr3fwfJvNcFeznhBs
          YgXw70TYX2bY/ulkZhWfzfBbTdtrzjPFsvFI+T/L35jhp5q2owDs51VIVvHYDM9sa/LY8XdtKy1l
          FXfM8FVN2/X2ajctZxVXzPA5TZvHpfb6CFXxkerUWTOcY11LX9w0tc20inX2mmF4qG3upnNWrOKB
          hIXLPu3dF1x+kRWq6ysHpkjDl+7eQjatYoOCDIZF3006U0unVSxIWTgTsI3HNP3soSJkFaflMDwL
          3OoHrph9YsPCJJ5466DyOGUHY3Epg2rWloUxnMjsNw7aw3AhMjwVhgW4HYm9FZaFQZ/bp6QeMRQe
          hhHehWKXGY7CAuSpW7MfKUZlAUqWdJ3DcbAAB3guZl9yKC4WYLfmT4muFtgVJwvQx7T2t0mnXK6J
          XlGGyAQvfNkaJ5JBmxnipubJ5HKDbJJsM0eY38QucSx5tJWTVHBwqDDZOzRNmn87fwDoyM4J2hRz
          NgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMy0wMi0xM1QxMzoxNTo1MCswMDowMKC8JaoAAAAldEVY
          dGRhdGU6bW9kaWZ5ADIwMjMtMDItMTNUMTM6MTU6NTArMDA6MDDR4Z0WAAAAKHRFWHRkYXRlOnRp
          bWVzdGFtcAAyMDIzLTAyLTEzVDEzOjE1OjUxKzAwOjAwIIO3fQAAAABJRU5ErkJggg=="></image>
          </svg>
            <div class="box">
            <input class="input" name="code[]" maxlength="1">
            <input class="input" name="code[]" maxlength="1">
            <input class="input" name="code[]" maxlength="1">
            <input class="input" name="code[]" maxlength="1">
            </div>
            <button class="btn1" type="submit">Submit</button>

            {{-- <a class="btn2" href="{{route('logout')}}">Back</a> --}}
        </form>
    </div>

    @endif
