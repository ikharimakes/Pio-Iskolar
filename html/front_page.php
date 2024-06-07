<?php include_once('../functions/general.php'); ?>
<?php include('../functions/display_ann.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/front.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="topBar">
            <span class="headerLogo">
                <img src="images/pio-logo.png" alt="logo"> 
                <div class="headerText">
                    <h1>Pio Iskolar</h1>
                </div>
            </span>

            <div class="info">
                <h1>ANNOUNCEMENT</h1>
            </div>

            <a href="#" class="btnLogIn"> 
                <ion-icon name="log-in-outline"></ion-icon>
                <h5> Log In </h5>
            </a>
        </div>
    </header> <br> <br>

    <!-- ANNOUNCEMENT -->
    <center>
        <div class="cards">
            <div class="card">
                <div class="slideshow">
                    <?php annFront();?>
                
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>  
                <br>

                <div style="text-align:center">
                    <?php slideshowButtons();?>
                </div>
            </div>
        </div>
    </center>

    <!-- LOG IN MODAL -->
    <div id="logInModal" class="logIn">
        <div class="logIn-content"> 
            <div class="infos">
                <img src="images/pio-logo.png" alt="pio">
                <h1>Log In to Pio Iskolar</h1>
                <span id="closeModal" class="close">&times;</span>
            </div>
            <br><br>
            <form id="loginForm" method="post">
                <div class="inner-content">
                    <label class="texts" for="user">Username</label> <br>
                    <input class="inputs" type="text" name="user" placeholder="example" required>
                </div>
                <div class="inner-content">
                    <label class="texts" for="password">Password</label> <br>
                    <div class="inputPass">
                        <input class="inputs" type="password" name="pass" placeholder="password" required>
                        <ion-icon name="eye-off-outline" id="togglePassword"></ion-icon>
                    </div>
                </div>
                <div id="loginError" style="color: red; display: none; text-align: center;">Invalid Credentials!</div>
                <a href="#" onclick="openModal('forgotModal')">Forgot Password</a>

                <div class="btn">
                    <button type="submit" class="logIn-button"> Log In </button>
                </div> <br>
            </form>
        </div>
    </div>

    <!-- FORGOT PASSWORD MODAL -->
    <div id="forgotModal" class="forgot">
        <div class="forgot-content">
            <div class="infos">
                <img src="images/pio-logo.png" alt="pio">
                <h1>Forgot Password</h1>
                <span class="close" onclick="closeModal('forgotModal')">&times;</span>
            </div>
            <br><br>

            <div class="inner-content">
                <label class="texts" for="email">Enter Email Address:</label> <br>
                <input class="inputs" type="email" id="email" name="email" placeholder="Email Address">
            </div>

            <div class="btn">
                <button onclick="openModal('passModal')" class="logIn-button"> Continue </button>
            </div> <br> <br>
        </div> 
    </div>

    <div id="passModal" class="pass">
        <div class="pass-content">
            <div class="infos">
                <img src="images/pio-logo.png" alt="pio">
                <h1>Forgot Password</h1>
                <span class="close" onclick="closeModal('passModal')">&times;</span>
            </div>
            <br><br>

            <div class="inner-content">
                <label class="texts" for="newPassword">Enter New Password:</label> <br>
                <div class="inputPass">
                    <input class="inputs" type="password" id="newPassword" name="newPassword" placeholder="New Password">
                    <ion-icon name="eye-off-outline" id="toggleNewPassword"></ion-icon>
                </div>
            </div>
            <div class="inner-content">
                <label class="texts" for="confirmPassword">Confirm Password:</label> <br>
                <div class="inputPass">
                    <input class="inputs" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                    <ion-icon name="eye-off-outline" id="toggleConfirmPassword"></ion-icon>
                </div>
            </div>

            <div class="btn">
                <button class="logIn-button" onclick="resetPassword()"> Reset Password </button>
            </div> <br>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // ANNOUNCEMENT
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        // LOG IN
        var modal = document.getElementById("logInModal");
        var span = document.getElementsByClassName("close")[0];

        document.querySelector("a[href='#']").addEventListener("click", function() {
            modal.style.display = "block";
        });
        span.onclick = function() {
            modal.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        // FORGOT PASSWORD
        function openModal(forgotModal) {
            var modal = document.getElementById(forgotModal);
            modal.style.display = "block";
        }
        function closeModal(forgotModal) {
            var modal = document.getElementById(forgotModal);
            modal.style.display = "none";
        }
        function openModal(passModal) {
            closeModal('forgotModal');
            var modal = document.getElementById(passModal);
            modal.style.display = "block";
        }
        function closeModal(passModal) {
            var modal = document.getElementById(passModal);
            modal.style.display = "none";
        }

        // VISIBILITY OF PASSWORD
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('input[name="pass"]');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.setAttribute('name', type === 'password' ? 'eye-off-outline' : 'eye-outline');
        });

        const toggleNewPassword = document.querySelector('#toggleNewPassword');
        const newPassword = document.querySelector('#newPassword');

        toggleNewPassword.addEventListener('click', function (e) {
            const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newPassword.setAttribute('type', type);
            this.setAttribute('name', type === 'password' ? 'eye-off-outline' : 'eye-outline');
        });

        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirmPassword');

        toggleConfirmPassword.addEventListener('click', function (e) {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.setAttribute('name', type === 'password' ? 'eye-off-outline' : 'eye-outline');
        });

        // AJAX LOGIN
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../functions/login.php',
                data: $(this).serialize(),
                success: function(response) {
                    if (response === 'admin') {
                        window.location.href = 'ad_dashboard.php';
                    } if (response === 'scholar') {
                        window.location.href = 'announce.php';
                    } else {
                        $('#loginError').show();
                    }
                }
            });
        });

        // RESET PASSWORD
        function resetPassword() {
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();
            if (newPassword !== confirmPassword) {
                alert("Passwords do not match!");
                return;
            }

            $.ajax({
                type: 'POST',
                url: '../functions/password.php',
                data: { newPassword: newPassword },
                success: function(response) {
                    alert(response);
                    if (response === 'Password reset successfully') {
                        closeModal('passModal');
                    }
                }
            });
        }
    </script>
</body>
</html>
