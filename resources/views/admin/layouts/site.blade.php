<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}' />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        li {
            list-style: none;
        }

        a {
            text-decoration: none !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .text-ellipsis {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .icon__top i {
            font-size: 30px !important;
            color: black !important;
        }

        .icon__top {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .dropdownNew {
            min-width: 50px;

            position: relative;

            color: black;
            margin-right: 20px;
        }

        .select {
            border-radius: 3px;
            border: 1px solid #FFF;
            box-shadow: 4px 3px 6px 0 rgba(0, 0, 0, 0.2);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 5px;

            color: #fff;

            cursor: pointer;
        }

        .selected {
            font-size: 18px;
            color: #000;
            font-weight: 600;

            width: 100%;

            text-align: center;
        }

        .caret {
            display: flex;
            align-items: center;
            justify-content: center;

            transition: .2s;
        }

        .dropmenu {
            padding: 2px 5px;

            background-color: #fff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            position: absolute;
            color: #9fa5b5;
            position: absolute;
            top: 4em;
            left: 50%;
            width: 100%;
            transform: translateX(-50%);

            opacity: 0;
            display: none;

            transition: .2s;

            z-index: 1;
            color: #000;
        }

        .dropmenu-open {
            display: block;
            opacity: 1;
        }

        .dropmenu__item {
            margin: 0.2em 0;
            border-radius: 0.2em;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .dropmenu__item a {
            padding: 0.3em 0.5em;
            font-size: 18px;
            font-weight: 600;
            color: #000;
            width: 100% !important;
            height: 100% !important;
        }

        .dropmenu__item a:hover {
            color: #000;
        }

        .dropmenu__item:hover {
            background-color: #e9ecef;
        }

        .donut {
            width: 1000px !important;
            height: auto !important;
        }

        .donut h3 {
            font-size: 40px !important;

        }

        .userClass {
            text-align: center;
        }

        .userClass i {
            text-align: center;
            color: #000;
        }

        .userClass::before,
        .userClass::after {
            content: none;
        }

        .userClass {
            padding: 6px 12px;
            box-shadow: 4px 3px 6px 0 rgba(0, 0, 0, 0.2);
        }

        .userClass2 {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar"
                                class="menu__fun nav-link nav-link-lg
                                collapse-btn">
                                <div class="icon__top">
                                    <i class="ri-arrow-left-double-line"></i>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <div class="dropdownNew">
                        <div class="select">
                            <div class="caret"><img src="img/dropdown_img.png" alt=""></div>

                            <div class="selected">{{ \App::getLocale() }}</div>
                        </div>

                        <ul class="dropmenu">
                            <li class="dropmenu__item sorting__cheap"><a href="{{ route('language', 'uz') }}">uz</a>
                            </li>
                            <li class="dropmenu__item sorting__from-a"><a href="{{ route('language', 'ru') }}">ru</a>
                            </li>
                            <li class="dropmenu__item sorting__from-z"><a href="{{ route('language', 'en') }}">en</a>
                            </li>
                        </ul>
                    </div>
                    <li class="dropdown userClass2">
                        <a href="#" data-toggle="dropdown" class="userClass dropdown-toggle nav-link-lg nav-link-user">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
                            <a href="{{ asset('profile') }}" class="dropdown-item has-icon"> <i
                                    class="far
                                            fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form class="dropdown-item has-icon text-danger" method="POST"
                                action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" class="dropdown-item has-icon text-danger"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    style="display: flex; align-items: center;">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('dashboard') }}"> <img alt="image"
                                src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                                class="logo-name">@lang('words.Admin')</span>
                        </a>
                    </div>
                    @include('admin.layouts.navbar')
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">

                @yield('content')

                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class="fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon"
                                            data-toggle="tooltip" data-original-title="Light Sidebar"><i
                                                class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon"
                                            data-toggle="tooltip" data-original-title="Dark Sidebar"><i
                                                class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Admin panel</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var iconTop = document.querySelector('.menu__fun');
            var icon = iconTop.querySelector('i');

            iconTop.addEventListener('click', function() {
                if (icon.classList.contains('ri-arrow-left-double-line')) {
                    icon.classList.remove('ri-arrow-left-double-line');
                    icon.classList.add('ri-arrow-right-double-line');
                } else {
                    icon.classList.remove('ri-arrow-right-double-line');
                    icon.classList.add('ri-arrow-left-double-line');
                }
            });

            let menuUrls = document.querySelectorAll(".mysidebar-menu li");
            let currentUrl = window.location.href;

            menuUrls.forEach((item, index) => {
                let itemUrl = item.children[0].href;

                if (currentUrl == 'http://127.0.0.1:8000/' && index === 0) {
                    menuUrls[0].classList.add("active");
                } else if (currentUrl.includes(itemUrl)) {
                    item.classList.add("active");
                } else {
                    item.classList.remove("active");
                }
            });
        });

        const dropdowns = document.querySelectorAll('.dropdownNew')

        dropdowns.forEach(dropdown => {
            const select = document.querySelector('.select')
            const caret = document.querySelector('.caret')
            const dropmenu = document.querySelector('.dropmenu')
            const options = document.querySelectorAll('.dropmenu__item')
            const selected = document.querySelector('.selected')



            select.addEventListener('click', () => {

                select.classList.toggle('select-clicked')

                caret.classList.toggle('caret-rotate')

                dropmenu.classList.toggle('dropmenu-open')
            })

            options.forEach(option => {
                option.addEventListener('click', () => {
                    selected.innerHTML = option.innerHTML

                    select.classList.remove('select-clicked')

                    caret.classList.remove('caret-rotate')

                    dropmenu.classList.remove('dropmenu-open')

                    options.forEach(option => {
                        option.classList.remove('active')
                    })

                    option.classList.add('active')
                })
            })


        })

        // translate
        function translateText(inputId, outputId, fromLang, toLang) {
            var inputValue = $('#' + inputId).val();
            var url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" + fromLang + "&tl=" + toLang + "&dt=t&q=" + encodeURI(inputValue);

            $.getJSON(url, function(data) {
                var translatedText = data[0][0][0];
                $('#' + outputId).val(translatedText);
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Your data object
        const data = {
        labels: ['Red', 'Blue', 'Yellow'],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
        };

        // Get the canvas element and create a 2d context
        const ctx = document.getElementById('myChart').getContext('2d');

        // Create a new chart and pass the data object
        const myChart = new Chart(ctx, {
            type: 'doughnut', // You can change the chart type as needed
            data: data,
        });
    </script>

    @yield('js')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
