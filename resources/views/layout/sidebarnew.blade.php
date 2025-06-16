<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh !important;

        }



        .sidebar {
            transform: translateX(0);
            transition: transform 0.4s ease, width 0.4s ease;

            overflow-y: hidden;
            width: 75px;
            height: 89vh;
            background-color: #172A88;
            color: white;

            left: 0;
            top: 0;
            transition: all 0.4s ease;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* z-index: 999; */
            border-radius: 8px;
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        .sidebar.active {
            width: 250px;
        }


        .toggle-btn {
            position: absolute;
            top: 330px;
            left: 75px;
            /* matches collapsed sidebar width */
            background: #172A88;
            color: white;
            border: 1px solid #000;
            padding: 12px 2px 12px 2px;
            cursor: pointer;
            z-index: 1000;
            transition: left 0.4s ease;
            border-radius: 0px 5px 5px 0pxb;
        }

        .toggle-btn i {
            transition: transform 0.4s ease;
        }

        .sidebar.active~.toggle-btn i {
            transform: rotate(180deg);
        }



        /* When sidebar is active (expanded) */
        #container.active1 .toggle-btn {
            left: 250px;
            border-radius: 0px 5px 5px 0px;

        }



        #Logo_div.active3 {
            width: 250px;
            text-align: center;
            padding: 20px 0 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70px;

        }


        .logo {

            width: 75px;
            height: auto;
            transition: all 0.4s ease-in-out;



        }

        #Logo.active2 {
            width: 250px;

            transition: all 0.3s ease;
        }

        .logo_div {
            width: 60px;
            transition: all 0.5s ease;
        }





        .sidebar-menu {
            list-style-type: none;
            width: 100%;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px;
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-size: 16px;
            transition: all 0.4s ease;
            width: 90%;
            margin-left: 5%;
            border-radius: 10px;
            margin-top: 10px;
            opacity: 1;
            transform: translateX(0);
            transition: all 0.4s ease;

        }

        .sidebar.active .menu-item {
            opacity: 1;
            transform: translateX(0);
            transition-delay: 0.1s;
        }

        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .menu-item:hover {
            background-color: white;
            color: black;
            box-shadow: 0 0 10px #ffffffa2;
            transition: all 0.3s ease;
        }

        .menu-item:hover i {
            color: black;
            transform: rotate(360deg);
            transition: transform 0.6s ease;
        }


        .submenu-items {
            display: none;
            flex-direction: column;
            padding-left: 30px;
            background-color: #172A88;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .submenu.open .submenu-items {
            max-height: 500px;
            /* enough to show all items */
        }

        .sidebar.active .submenu:hover .submenu-items {
            display: flex;
            max-height: 500px;
            opacity: 1;
            pointer-events: auto;
        }

        .submenu-items {
            display: none;
            flex-direction: column;
            padding-left: 30px;
            background-color: #172A88;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .submenu.open .submenu-items {
            display: flex;
            /*  */
            max-height: 500px;
            /* adjust as needed */
        }



        .submenu-items a {
            color: white;
            text-decoration: none;
            padding: 15px 10px 15px 10px;
            display: block;
            border-radius: 8px;
            width: 90%;
            height: auto;
        }

        .submenu-items a:hover {
            background-color: white;
            color: black;
            box-shadow: 0 0 10px #ffffffa2;
            transition: all 0.3s ease;
        }

        .submenu-items a:hover i {
            transform: rotate(360deg);
            transition: transform 0.6s ease;
        }

        .item-name {
            display: none;
            white-space: nowrap;
        }

        .sidebar.active .item-name {
            display: inline-block;
        }

        .content {
            margin-left: 60px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.active~.content {
            margin-left: 250px;

        }

        @keyframes bounceSlide {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .toggle-btn-animate {
            animation: bounceSlide 0.3s ease;
        }


        @keyframes slideFadeIn {
            0% {
                opacity: 0;
                transform: translateX(-20px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .logo-entry-animate {
            animation: slideFadeIn 0.5s ease forwards;
        }

        @keyframes slideFadeOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(-20px);
            }
        }

        .logo-exit-animate {
            animation: slideFadeOut 0.3s ease forwards;
        }



        .rotate {
            transform: rotate(180deg);
            transition: transform 0.4s ease;
        }

        .fas.fa-caret-down {
            transition: transform 0.4s ease;
        }

        ul {
            padding-left: 0%;
        }

        ol,
        ul {
            padding-left: 0rem;
        }

        /* delete */
        .logout-item {
            margin-top: auto;
            width: 100%;
        }

        .rotate {
            transform: rotate(180deg);
            transition: transform 0.4s ease;
        }

        .fas.fa-caret-down {
            transition: transform 0.4s ease;
        }


        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar.active {
                width: 200px;
            }

            .toggle-btn {
                left: 60px;
            }

            .sidebar.active .submenu:hover .submenu-items {
                display: flex;
            }

            .sidebar.active~.toggle-btn {
                left: 200px;

            }

            .content {
                margin-left: 60px;
            }

            .sidebar.active~.content {
                margin-left: 200px;
            }

            .menu-item {
                justify-content: center;
            }

            .menu-item .item-name {
                display: none;
            }

            /* changed  */
            ul {
                padding-left: 0%;
            }

            ol,
            ul {
                padding-left: 0rem;
            }
        }
    </style>
</head>

<body>
    <div id="container">
        <button class="toggle-btn" id="toggleBtn"><i class="fas fa-angle-left"></i></button>

        <div class="logo_div" id="Logo_div">
            <img id="Logo" class="logo" src="{{ asset('logo crop img.png') }}"
                data-collapsed="{{ asset('logo crop img.png') }}" data-expanded="{{ asset('logo.png') }}" alt="logo-img"
                onerror="this.src='{{ asset('logo crop img.png') }}">

        </div>

        <div class="sidebar" id="sidebar">

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="menu-item">
                        <i class="fa-solid fa-house "></i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="submenu">
                    <a class="menu-item">
                        <i class="fa-solid fa-users"></i>
                        <span class="item-name">Customer</span>
                        <i onclick="myFunction()" class="fas fa-caret-down"></i>
                    </a>
                    <div class="submenu-items">
                        <a href="{{route('create-customer')}}">Create Customer</a>
                        <a href="{{route('mailing_list')}}">Mailing</a>
                    </div>
                </li>
                <li class="submenu">
                    <a class="menu-item">
                        <i class="fa-solid fa-user-plus"></i>
                        <span class="item-name">Main</span>
                        <i onclick="myFunction()" class="fas fa-caret-down"></i>
                    </a>
                    <div class="submenu-items">
                        <a href="{{route('monthly')}}">Monthly Calender</a>
                        <a href="{{route('today_activity')}}">Today Activities</a>
                    </div>
                </li>
                <li class="submenu">
                    <a class="menu-item">
                        <i class="fa-regular fa-calendar"></i>
                        <span class="item-name">Appointment</span>
                        <i onclick="myFunction()" class="fas fa-caret-down"></i>
                    </a>
                    <div class="submenu-items">
                        <a href="{{route('appointment')}}">Create</a>
                        <a href="{{route('pending')}}">Pending</a>
                        <a href="{{route('appointment_schedule')}}">Schedule</a>
                        <a href="{{route('appointment_history')}}">History</a>
                    </div>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span class="item-name">Assign Appointment</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <i class="fas fa-file-invoice"></i>
                        <span class="item-name">Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <i class="fa-solid fa-flag"></i>
                        <span class="item-name">Report</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item">
                        <i class="fas fa-cogs"></i>
                        <span class="item-name">Reminder</span>
                    </a>
                </li>
                <li class="logout-item">
                    <a href="#" class="menu-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="item-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>




        <script>
            // document.querySelectorAll('.submenu > .menu-item').forEach(item => {
            //     item.addEventListener('click', () => {
            //         const parent = item.parentElement;
            //         const caretIcon = item.querySelector('.fa-caret-down');

            //         parent.classList.toggle('open');

            //         if (caretIcon) {
            //             caretIcon.classList.toggle('rotate');
            //         }
            //     });
            // });


            const toggleBtn = document.getElementById('toggleBtn');
            const sidebar = document.getElementById('sidebar');
            const Logo = document.getElementById('Logo');
            const Logo_div = document.getElementById('Logo_div');
            const toggle_sub = document.getElementsByClassName('toggle_sub');


            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                container.classList.toggle('active1');
                Logo_div.classList.toggle('active3');

                const icon = toggleBtn.querySelector('i');

                // Animate toggle button
                toggleBtn.classList.remove('toggle-btn-animate');
                void toggleBtn.offsetWidth;
                toggleBtn.classList.add('toggle-btn-animate');

                if (sidebar.classList.contains('active')) {
                    icon.classList.remove('fa-angle-left');
                    icon.classList.add('fa-angle-right');

                    // Animate logo IN
                    Logo.classList.remove('logo-exit-animate');
                    Logo.src = Logo.dataset.expanded;
                    void Logo.offsetWidth;
                    Logo.classList.add('logo-entry-animate');

                    Logo.classList.add('active2');

                } else {
                    icon.classList.remove('fa-angle-right');
                    icon.classList.add('fa-angle-left');

                    // Animate logo OUT
                    Logo.classList.remove('logo-entry-animate');
                    Logo.classList.add('logo-exit-animate');

                    // After animation completes, change image
                    setTimeout(() => {
                        Logo.src = Logo.dataset.collapsed;
                    }, 300);

                    Logo.classList.remove('active2');
                }
            });


            function myFunction() {
                const toggleBtn = document.getElementById('toggleBtn');
                const sidebar = document.getElementById('sidebar');
                const Logo = document.getElementById('Logo');
                const Logo_div = document.getElementById('Logo_div');

                sidebar.classList.toggle('active');
                container.classList.toggle('active1');
                Logo_div.classList.toggle('active3');
                Logo.classList.toggle('active2');

                const icon = toggleBtn.querySelector('i');
                if (sidebar.classList.contains('active')) {
                    icon.classList.remove('fa-angle-left');
                    icon.classList.add('fa-angle-right');
                    Logo.src = Logo.dataset.expanded;
                } else {
                    icon.classList.remove('fa-angle-right');
                    icon.classList.add('fa-angle-left');

                    Logo.src = Logo.dataset.collapsed;
                }


            }
        </script>
    </div>

</body>

</html>