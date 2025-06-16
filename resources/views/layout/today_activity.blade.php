<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/today-act.css') }}">
    
</head>

<body style="display:flex">
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

                </div>
                <hr style="width: 65%">
                <h3 style="margin-left: 20px">CALENDAR VIEW TODAY</h3>
                <div></div>

                <div class="calander_view">
                    <div class="cal_1st">
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color: white;">
                                <p>09:00-09:30 AM</p>
                            </div>
                        </div>
                        <div class="cal_1sbottom">
                            <h5>Arif</h5>
                        </div>

                    </div>
                    <div>
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color: white;">
                                <p style="color: black">Friday, April 4, 2025</p>
                            </div>
                        </div>
                        <div class="cal_1sbottom">
                            <p>Martin Cortazar 9068207731 Amber Gardens, #07-04 The Esta, S439967</p>
                        </div>

                    </div>
                    <div>
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color: white;">11:00-11:30 AM</div>
                        </div>
                        <div class="cal_1sbottom">
                            <p>Perada8795655676 Shenton #28-06 S079119(N)</p>
                        </div>
                    </div>
                    <div>
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color: white;">11:00-11:30 AM</div>
                        </div>
                        <div class="cal_1sbottom">
                            <p>MISS PRIYA96579852281 Bedok South Ave 
                                (4units)</p>
                        </div>

                    </div>
                    <div>
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color: white;">11:00-11:30 AM</div>
                        </div>
                        <div class="cal_1sbottom">2</div>

                    </div>
                    <div>
                        <div class="cal_1sttop">
                            <div style="width: 150px; height:40px; background-color:white;">11:00-11:30 AM</div>
                        </div>
                        <div class="cal_1sbottom">
                            <p>Mr Hoong961621347 Marine #16-17 Marine Vista S449031 Blk 1 King Albert Park, </p>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

</body>

</html>
