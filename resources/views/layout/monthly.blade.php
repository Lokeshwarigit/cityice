<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly</title>
</head>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fc;
    }

    .container {

        margin-top: 10px;
        padding: 0px 5px 0px 20px;
        width: 100%;
        height: 98vh;
    }

    .top_nav_tot {

        display: flex;
        width: 100%;
        justify-content: space-between;
        gap: 100px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        margin-bottom: 15px;
        height: 80px;
    }

    .top_nav {

        margin-left: 10px;


    }

    .top_nav_to {
        display: flex;
    }

    .top_nav h4 {
        font-size: 20px;
        color: #222;
        margin: 0 0 5px;
    }

    .top_nav p {
        font-size: 14px;
        color: #888;
        margin: 0;
    }

    .box_container {
        margin-top: 20px;
        display: flex;
        height: 79%;
        width: 100%;
    }

    /*   */
    .calander_top {
        display: flex;
        height: 50px;
        width: 500px;
        justify-content: space-between;

    }

    .cal_last {
        width: 250px;
        display: flex;
        justify-content: center;
        align-items: baseline;
    }

    .box_container2 {
        width: 100%;

    }

    .profile-card {
        width: 20%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .profile-card img {
        width: 30px;
        height: 30px;

    }

    .breadcrumb-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
        padding: 15px 30px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        margin-top: -10px;
    }

    .breadcrumb a {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb i {
        margin: 0 5px;
        color: #888;
        margin-top: 6px;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .breadcrumb {
        color: grey;
    }


    .search-box {
        position: relative;
        width: 250px;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #999;
    }

    .search-input {
        width: 100%;
        padding: 8px 12px 8px 32px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: white;
    }

    .filter-dropdown {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }



    .search-box {
        position: relative;
        width: 250px;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #999;
    }

    .box_container {
        margin-top: 20px;
        display: flex;
        height: 79%;
        width: 100%;
    }

    .box_container2 {
        width: 100%;

    }
</style>

<body style="display: flex">
    @include('layout.sidebarnew')
    <div class="container">
        <div class="top_nav_tot">
            <div class="top_nav">
                <h4 style="padding-top: 10px;">Appointment Calendar</h4>
                <p style="width: 300px;">Use the form below to view Today Activities.</p>

            </div>
            <div class="profile-card">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Image">
                <div class="profile-details">
                    <div class="profile-name">Dinesh kumar .G</div>
                    <div class="profile-email">dineshkumardextra@gmail.com</div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="#">Home</a> <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
        </div>
        <div class="box_container" ">
            <div class="box_container2">
                <div class="calander_top">
                    <div class="cal_last">
                        <i id="calander_I" class="fa-solid fa-circle" style="color: #24d3ff;"></i>
                        <p>Uncomplete Appointments</p>
                    </div>
                    <div class="cal_last">
                        <i id="calander_I" class="fa-solid fa-circle" style="color: #B197FC;"></i>
                        <p>Completed Appointments</p>

                    </div>
                    <div class="cal_last">
                        <i id="calander_I" class="fa-solid fa-circle" style="color: #B197FC;"></i>
                        <p>Completed Appointments</p>

                    </div> 
                    

                </div>
                <hr style="width: 65%">
                <h3 style="margin-left: 20px">CALENDAR VIEW TODAY</h3>
            </div>
    
</body>
</html>
