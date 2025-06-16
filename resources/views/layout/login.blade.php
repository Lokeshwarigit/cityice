<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <div class="row flex-column flex-md-row align-items-center">


            <!-- Left Column -->
            <div class="col-md-6 col-12">
                <div id="logo_img">
                    <img src="logo.png" alt="Logo">
                </div>
                <div id="loginpage_text">
                    <h4>Login</h4>
                </div>

                <div class="login-container">
                    <form class="login-form" method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="user_div">
                            <label for="username">User Name</label>
                            <input type="text" id="username" name="username" required>
                        </div>

                        <div class="user_div">
                            <label for="password">Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="password-field" name="password" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>

                        <button id="Sign" type="submit">Sign In</button>
                    </form>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6 col-12 text-center">
                <div class="image-slider">
                    <img class="ac_img active" src="full-shot-mean-cleaning-air.jpg" alt="Image 1">
                    <img class="ac_img" src="young 2-bearded-handyman-repairing-air-conditioner_473712-1854.jpg"
                        alt="Image 2">
                    <img class="ac_img" src="young-bearded-handyman-repairing-air-conditioner_473712-1849.jpg"
                        alt="Image 3">
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Password toggle
            const togglePassword = document.querySelector(".toggle-password");
            const passwordField = document.querySelector("#password-field");

            togglePassword.addEventListener("click", function() {
                const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                passwordField.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });

            // Image slider
            const images = document.querySelectorAll('.image-slider .ac_img');
            let current = 0;

            setInterval(() => {
                images[current].classList.remove('active');
                current = (current + 1) % images.length;
                images[current].classList.add('active');
            }, 2000);
        });
    </script>

</body>

</html>
