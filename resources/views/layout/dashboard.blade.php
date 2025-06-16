<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style=" background-color: whitesmoke; display: flex;">
    <div class="wrapper">
        @include('layout.sidebarnew')
        <div class="nav_bar">
            <div class="top_nav">
                <h4>Super Admin Dashboard</h4>
                <p>Users, Vendors, Customers and Appointments count details here!</p>
            </div>
            <div class="breadcrumb-buttons">

                <div class="breadcrumb">
                    <a href="#">Home</a> <i class="fa-solid fa-angles-right"></i> Dashboard
                </div>

            </div>
            <div class="das_count">
                <div class="das_1"></div>
                <div class="das_2"></div>
                <div class="das_3"></div>
                <div class="das_4"></div>
            </div>
            <div class="toworrow_ap">
            </div>
        </div>



    </div>



</body>

</html>
