@extends('admin.layouts.site')
@section('content')

    <style>
        :root {
            --body-bg: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --msger-bg: #fff;
            --border: 2px solid #ddd;
            --left-msg-bg: #ececec;
            --right-msg-bg: #579ffb;
        }

        .msger-chat {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            height: 500px;
        }

        .msger-chat::-webkit-scrollbar {
            width: 6px;
        }

        .msger-chat::-webkit-scrollbar-track {
            background: #ddd;
        }

        .msger-chat::-webkit-scrollbar-thumb {
            background: #bdbdbd;
        }

        .msg {
            display: flex;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .msg:last-of-type {
            margin: 0;
        }

        .msg-bubble {
            max-width: 450px;
            padding: 15px;
            border-radius: 15px;
            background: var(--left-msg-bg);
        }

        .msg-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .msg-info-name {
            margin-right: 10px;
            font-weight: bold;
        }

        .msg-info-time {
            font-size: 0.85em;
        }

        .left-msg .msg-bubble {
            border-bottom-left-radius: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .right-msg {
            flex-direction: row-reverse;
        }

        .right-msg .msg-bubble {
            background: var(--right-msg-bg);
            color: #fff;
            border-bottom-right-radius: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .send {
            position: fixed;
            bottom: 0%;
            right: 0%;
            width: 100%;
            background: #fff;
        }

        .send__inner {
            display: flex;
            align-items: center;
            gap: 30px;
            justify-content: end;
            width: 100%;
            padding: 20px 30px
        }

        .send__input {
            width: 50%;
        }

        .msg-text {
            margin-bottom: 10px
        }

        .file-input-label {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;

            background-color: #6777ef;
            border-color: transparent !important;
            border-radius: 0.25rem;
            box-shadow: 0 2px 6px #acb5f6;

            color: #fff;
            margin: 0 !important;
        }

        .file-input-label i {
            margin: 0%;
            padding: 0%;
        }

        .image__chat {
            border-radius: 10px;
        }

        .audio__box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .btn__audio i {
            font-size: 16px
        }

        .wave-menu {
            border: 4px solid #545FE5;
            border-radius: 50px;
            width: 200px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
            cursor: pointer;
            transition: ease 0.2s;
            position: relative;
            background: #fff;
            }

            .wave-menu li {
            list-style: none;
            height: 30px;
            width: 4px;
            border-radius: 10px;
            background: #545FE5;
            margin: 0 6px;
            padding: 0;
            animation-name: wave1;
            animation-duration: 0.3s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            transition: ease 0.2s;
            }

            .wave-menu:hover > li {
            background: #fff;
            }

            .wave-menu:hover {
            background: #545FE5;
            }

            .wave-menu li:nth-child(2) {
            animation-name: wave2;
            animation-delay: 0.2s;
            }

            .wave-menu li:nth-child(3) {
            animation-name: wave3;
            animation-delay: 0.23s;
            animation-duration: 0.4s;
            }

            .wave-menu li:nth-child(4) {
            animation-name: wave4;
            animation-delay: 0.1s;
            animation-duration: 0.3s;
            }

            .wave-menu li:nth-child(5) {
            animation-delay: 0.5s;
            }

            .wave-menu li:nth-child(6) {
            animation-name: wave2;
            animation-duration: 0.5s;
            }

            .wave-menu li:nth-child(8) {
            animation-name: wave4;
            animation-delay: 0.4s;
            animation-duration: 0.25s;
            }

            .wave-menu li:nth-child(9) {
            animation-name: wave3;
            animation-delay: 0.15s;
            }

            @keyframes wave1 {
            from {
                transform: scaleY(1);
            }

            to {
                transform: scaleY(0.5);
            }
            }

            @keyframes wave2 {
            from {
                transform: scaleY(0.3);
            }

            to {
                transform: scaleY(0.6);
            }
            }

            @keyframes wave3 {
            from {
                transform: scaleY(0.6);
            }

            to {
                transform: scaleY(0.8);
            }
            }

            @keyframes wave4 {
            from {
                transform: scaleY(0.2);
            }

            to {
                transform: scaleY(0.5);
            }
            }
        .btn__send i {
            font-size: 16px !important;
        }

        .btn__send {
            border-radius: 100%;
            transition: .3s;
        }

        /* AnimationsJs */
        #sendMessageBtn {
            max-height: 0;
            overflow: hidden;
            visibility: hidden;
            opacity: 0;
            transition: max-height 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
        }

        #sendMessageBtn.show {
            max-height: 100px; /* или любая другая высота */
            visibility: visible;
            opacity: 1;
        }



    </style>

    <div>
        <h1 class="text-center">Chat</h1>
        <div class="msger-chat"></div>
        <div class="send">
            <form class="send__inner" id="chatForm" enctype="multipart/form-data">
                <input type="text" id="messageInput" placeholder="Write here to your message!" class="form-control send__input">

                <div id="audioPreview" style="display: none;" class="audio__box">
                    <audio controls id="audioPlayer">
                        <source id="audioSource" type="audio/wav">
                    </audio>
                    <button type="button" id="deleteAudioBtn" class="btn btn-danger btn__audio"><i class="fas fa-light fa-trash-can"></i></button>
                </div>

                <label for="imageInput" class="file-input-label" id="imgInput">
                    <i class="fas fa-light fa-image"></i>
                </label>
                <input type="file" id="imageInput" accept="image/*" style="display:none;">
                <ul class="wave-menu" id="audio-animation" style="display: none">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <button id="recordAudioBtn" class="btn btn-primary">
                    <i class="fa-solid fa-microphone"></i>
                    <span id="recordButtonText" style="display: none">Start Record</span>
                </button>
                <button id="sendMessageBtn" class="btn btn-primary btn__send" ><i class="fas fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var audioChunks = [];

            $('#messageInput').on('input', function() {
                var messageInputValue = $(this).val();
                toggleSendButtonVisibility(messageInputValue);
            });

            $('#messageInput').on('keydown', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            });

            $('#deleteAudioBtn').on('click', function() {
                // Pause and reset the audio player
                var audioPlayer = $('#audioPlayer')[0];
                audioPlayer.pause();
                audioPlayer.currentTime = 0;

                // Hide the audio preview and show the message input
                $('#audioPreview').hide();
                $('#messageInput').show();
                $('#imgInput').show();
                $('#sendMessageBtn').removeClass('show');
                $('#recordAudioBtn').show();

                // Clear the audio chunks (assuming you want to clear the recorded audio)
                audioChunks = [];
            });


            // Функция для изменения видимости кнопки "Send"
            function toggleSendButtonVisibility(messageInputValue) {
                var sendButton = $('#sendMessageBtn');
                var voiceButton = $('#recordAudioBtn');

                if (messageInputValue) {
                    sendButton.addClass('show');
                    voiceButton.hide();
                } else {
                    sendButton.removeClass('show');
                    voiceButton.show();
                }
            }

            const baseUrl = '{{ url('/') }}';
            const pusher = new Pusher('bfff60d5708fda2d0873', {
                cluster: 'ap2'
            });

            const channel = pusher.subscribe('chat');

            const chatWindow = document.querySelector('.msger-chat');

            // Глобальная функция для отметки сообщения как прочитанного
            function markMessageAsRead(messageId) {
                console.log('MessageId:',messageId)
                fetch('/api/messagesid', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        messageId: messageId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Message marked as read:', data);

                    // Обновляем интерфейс, чтобы показать галочку
                    const messageElement = document.querySelector(`.msg[key="${messageId}"] .msg-bubble`);
                    if (messageElement) {
                        console.log(messageElement)
                        const checkmarkElement = messageElement.querySelector('.checkmark');
                        if (checkmarkElement) {
                            checkmarkElement.style.display = data.read == true ? 'block' : 'none';
                            console.log('Data-read:',data.read)
                            console.log('Data:',data)
                        }
                    }
                })
                .catch(error => {
                    console.error('Error marking message as read:', error);
                });
            }

            channel.bind('message', function (data) {
                const messageId = 'message-' + Date.now();
                const messageHtml = `<div key="${data.uuid}" class="msg ${data.username == "admin" ? "right-msg" : "left-msg"}">
                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">${data.username}</div>
                            <div class="msg-info-time">
                                ${data.date.substring(12)}
                            </div>
                        </div>
                        <div class="msg-text">${data.message}</div>
                        ${data.image ? `<img class="image__chat" src="${baseUrl}/storage/${data.image}" alt="${baseUrl}/${data.image}">` : ''}
                        ${data.audio ? `<audio controls>
                                            <source src="${baseUrl}/storage/${data.audio}" type="audio/wav">
                                        </audio>` : ''}
                        <div class="checkmark" style="display: ${data.read == true ? 'block' : 'none'}">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>`;

                console.log('Channel:',data)

                chatWindow.innerHTML += messageHtml;

                // После добавления сообщения добавляем слушатель событий
                const messageElement = document.querySelector(`.msg[key="${messageId}"] .msg-bubble`);
                if (messageElement) {
                    messageElement.addEventListener('click', () => {
                        markMessageAsRead(messageId);
                    });
                }
            });


            const sendMessageBtn = document.getElementById('sendMessageBtn');
            const messageInput = document.getElementById('messageInput');
            const imageInput = document.getElementById('imageInput');
            const chatForm = document.getElementById('chatForm');
            var mediaRecorder;

            messageInput.addEventListener('input', function () {
                const selectedFile = imageInput.files[0];
                if (selectedFile) {
                    console.log(selectedFile.name); // or do whatever you need with the file
                }
            });

            function generateUUID() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = (Math.random() * 16) | 0,
                    v = c == 'x' ? r : (r & 0x3) | 0x8;
                    return v.toString(16);
                });
            }

            sendMessageBtn.addEventListener('click', async function (e) {
                e.preventDefault();

                const message = messageInput.value;
                const currentDate = new Date().toLocaleString();

                const formData = new FormData();
                formData.append('username', 'admin');
                formData.append('message', message);
                formData.append('date', currentDate);
                formData.append('uuid', generateUUID());

                const imageInput = document.getElementById('imageInput');
                if (imageInput.files.length > 0) {
                    formData.append('image', imageInput.files[0]);
                }

                // Добавляем аудио в FormData
                if (audioChunks.length > 0) {
                    const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                    formData.append('audio', audioBlob, 'audio.wav');
                }

                try {
                    const response = await fetch('/api/messages', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        const errorMessage = await response.text();
                        console.error(`HTTP error! Status: ${response.status}, Message: ${errorMessage}`);
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const data = await response.json();
                    messageInput.value = '';
                    imageInput.value = ''; // Clear the file input
                    audioChunks = [];
                    toggleSendButtonVisibility(messageInput.value)
                    $('#audioPreview').hide();
                    $('#messageInput').show();
                    $('#imgInput').show();
                } catch (error) {
                    console.error('Error sending message:', error);
                }
            });


            // AUDIO
            var recordButton = document.getElementById('recordAudioBtn');
            const recordButtonText = document.getElementById('recordButtonText');

            recordButton.addEventListener('click', function (e) {
                e.preventDefault();

                if (recordButtonText.textContent === 'Start Record') {
                    startRecording();
                    recordButtonText.textContent = 'End Record';
                    recordButton.innerHTML = '<i class="fa-solid fa-microphone-slash"></i>';
                } else {
                    stopRecording();
                    recordButtonText.textContent = 'Start Record';
                    recordButton.innerHTML = '<i class="fa-solid fa-microphone"></i>';
                }
            });


            function startRecording() {
                // audioChunks = [];
                // Проверяем, активен ли уже MediaRecorder
                if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                    console.warn('Recording is already in progress.');
                    return;
                }

                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(function (stream) {
                        mediaRecorder = new MediaRecorder(stream);
                        $('#messageInput').hide();
                        $('#imgInput').hide();
                        $('#audio-animation').show();

                        mediaRecorder.ondataavailable = function (event) {
                            if (event.data.size > 0) {
                                audioChunks.push(event.data);
                            }
                        };

                        mediaRecorder.onstop = function () {
                            var audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                            var audioUrl = URL.createObjectURL(audioBlob);
                            console.log(audioUrl);
                            stopRecording();
                        };

                        mediaRecorder.start();
                    })
                    .catch(function (error) {
                        console.error('Error accessing microphone:', error);
                    });
            }

            function stopRecording() {
                if (mediaRecorder && mediaRecorder.state === 'recording') {
                    mediaRecorder.stop();
                }

                $('#audioPreview').show();

                // Show/hide other elements as needed
                $('#sendMessageBtn').addClass('show');
                $('#recordAudioBtn').hide();
                $('#messageInput').hide();
                $('#imgInput').hide();
                $('#audio-animation').hide();

                playAudio()
            }

            function playAudio() {
                // Создаем Blob из массива audioChunks
                var audioBlob = new Blob(audioChunks, { type: 'audio/wav' });

                // Создаем URL для Blob
                var audioUrl = URL.createObjectURL(audioBlob);

                // Устанавливаем URL как источник для тега audio
                $('#audioSource').attr('src', audioUrl);

                // Перезагружаем аудиоплеер для применения изменений
                var audioPlayer = $('#audioPlayer')[0]; // Преобразуем jQuery-объект в DOM-элемент
                if (audioPlayer && typeof audioPlayer.load === 'function') {
                    audioPlayer.load();
                }

                // Показываем элемент audioPreview
                $('#audioPreview').show();
            }

        });
    </script>

@endsection
