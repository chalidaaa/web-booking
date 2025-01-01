<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
    header("Location: admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilik Foto</title>
    <!-- CSS-link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.min.css">
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/wersfiga" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/luxenta-complete-family" rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == 'gagal_login') {
    ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                Gagal Login
            </div>
        <?php
        } elseif ($_GET['alert'] == "login_dulu") {
        ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                Login Dulu Untuk Booking
            </div>
        <?php
        } elseif ($_GET['alert'] == "berhasil_login") {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Berhasil Login
            </div>
        <?php
        } elseif ($_GET['alert'] == "berhasil_register") {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Berhasil Rregister
            </div>
        <?php
        } elseif ($_GET['alert'] == "gagal_register") {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Gagal Register
            </div>
        <?php
        } elseif ($_GET['alert'] == "berhasil_logout") {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Berhasil Logout
            </div>
    <?php
        }
    }
    ?>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == 'gagal') {
    ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                Gagal Booking
            </div>
        <?php
        } elseif ($_GET['alert'] == "berhasil") {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                Berhasil Booking
            </div>
    <?php
        }
    }
    ?>
    <header>
        <div class="hero-nav">
            <div class="nav">
                <!-- <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div> -->
                <div class="logo">
                    <a href="index.php"><img src="image/logo.png" alt=""></a>
                </div>
                <ul class="navmenu">
                    <li><a href="index.php">ABOUT</a></li>
                    <li><a href="#price">PRICES</a></li>
                    <li><a href="shop.php">TESTIMONIALS</a></li>
                    <li><a href="about.php">CONTACT US</a></li>
                </ul>
                <div class="auth">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '
                            <span>Welcome, ' . $_SESSION['user_name'] . '</span>
                            <a href="logout.php"><button id="logout">Logout</button></a>';
                    } else {
                        echo '<button id="login">Masuk</button>
                            <button id="regist">Daftar</button>';
                    }
                    ?>
                    <!-- <button id="login">Masuk</button>
                    <button id="regist">Daftar</button> -->
                </div>
            </div>
            <div class="hero-desc">

                <p>is a photo studio, where instead of a <br> photographer, a remote control is in your hands <br>
                    is a photo studio,</p>
                <div class="book">
                    <a href="#price">
                        <button id="book">Pesan Sekarang</button>
                    </a>
                    <a id="vector" href="#price">
                        <img src="image/Vector.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="why-us-section">
        <div class="images-container">
            <img src="image/cw1.png" alt="Model 1" class="image">
            <img src="image/cw2.png" alt="Model 2" class="image">
            <img src="image/cw3.png" alt="Model 3" class="image">
        </div>
        <div class="text-container">
            <h2>Why us?<br>What makes BilikFoto so special?</h2>
            <p>Kenapa produk kolang kaling kami terbaik? Karena kami menghadirkan kolang kaling dalam berbagai bentuk dan rasa yang tak tertandingi. Kolang kaling kami menawarkan kelembutan, rasa alami, dan kenyamanan yang memanjakan lidah. Setiap produk dipilih dari buah terbaik, diproses dengan teknik khusus, dan tanpa bahan pengawet. Hasilnya adalah rangkaian produk kolang kaling yang lezat, sehat, dan eksklusif! Nikmati kualitas premium di setiap gigitan!</p>
        </div>
    </section>
    <section class="price-list-section">
        <h1 class="title">Price List</h1>

        <div id="price" class="price-list-container">
            <!-- Basic Plan -->
            <div class="basic-plan">
                <h2>40k <span>/each</span></h2>
                <h3>Basic</h3>
                <p>Self photo session</p>
                <ul>
                    <li>✔️ 1/2 Persons</li>
                    <li>✔️ 15 mins photoshoot</li>
                    <li>✔️ 10 mins photo</li>
                    <li>✔️ Choose colour &</li>
                    <li>✔️ All digital photos</li>
                </ul>
                <?php
                if (isset($_SESSION['user_id'])) {

                ?>
                    <button id="reservasi" class="book-now-btn">Book Now</button>
                <?php
                } else {
                ?>
                    <a href="#login"><button class="book-now-btn">Login First</button></a>
                <?php
                }
                ?>

            </div>

            <!-- Divider -->
            <!-- <div class="divider"></div> -->

            <!-- Additional Info -->
            <div class="additionals">
                <h3>Additionals:</h3>
                <p><strong>25k</strong> / 4 persons max</p>
                <div class="additional-item">
                    <img src="image/Frame 2354.png" alt="Group Icon">
                    <img src="image/Frame 2348.png" alt="Group Icon">
                    <img src="image/Group 1000002265.png" alt="Printed Photo">
                    <span>1 extra printed photo</span>
                </div>
                <p><strong>15k</strong> / 1 extra printed photo</p>
                <div class="additional-item">
                    <img src="image/Frame 2358.png" id="single" alt="Single Photo">
                    <!-- <img src="image/single-photo-icon.png" alt="Single Photo"> -->
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-section">
        <h2>Testimonials</h2>
        <div class="testimonials-container">
            <button class="arrow left-arrow">←</button>
            <div class="testimonials-carousel">
                <div class="testimonial">
                    <img src="image/testi1.png" alt="Testimonial 1">
                    <h3>John Doe</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – John Doe</p>
                </div>
                <div class="testimonial">
                    <img src="image/testi2.png" alt="Testimonial 2">
                    <h3>John Doe</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – John Doe</p>
                </div>
                <div class="testimonial">
                    <img src="image/testi3.png" alt="Testimonial 3">
                    <h3>John Doe</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – John Doe</p>
                </div>
            </div>
            <button class="arrow right-arrow">→</button>
        </div>
    </section>
    <div class="popup-overlay" id="popupForm">
        <div class="popup-content">
            <span class="close-btn" id="closePopup">&times;</span>
            <h2>Book Your Photo Session</h2>
            <form action="booking.php" method="POST">
                <!-- <label for="name">Full Name</label> -->
                <input hidden value="<?= $_SESSION['user_id']; ?>" type="text" id="name" name="user_id" placeholder="Enter your full name" required>
                <!-- <p><?= $_SESSION['user_id']; ?></p> -->
                <label for="date">Choose Date</label>
                <input type="datetime-local" id="date" name="date" required>

                <label for="phone">Note</label>
                <input type="text" id="note" name="note" placeholder="Note Optional">

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    <section class="contact-section">
        <h2>Contact Us</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Hubungi Kami</h3>
                <p>
                    Kami di sini untuk membantu Anda! Apakah Anda memiliki pertanyaan tentang produk kami,
                    memerlukan bantuan dengan pesanan, atau ingin berbagi pengalaman berbelanja? Jangan ragu untuk menghubungi kami.
                </p>
                <ul>
                    <li>📞 no admin bilik foto</li>
                    <li>📍 alamat bilikfoto</li>
                    <li>📧 bilikfoto.smg</li>
                </ul>
                <form class="contact-form">
                    <h4>Send us a message</h4>
                    <input type="text" placeholder="Nama Lengkap">
                    <input type="email" placeholder="Alamat Email">
                    <input type="tel" placeholder="No Handphone">
                    <textarea placeholder="Pesan"></textarea>
                    <button type="submit">Kirim Pesan</button>
                </form>
            </div>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63372.853996441474!2d107.56989382635086!3d-6.914097399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7f7373e79c1%3A0x1d87df97bc538674!2sBilikfoto-%20Bandung!5e0!3m2!1sen!2sid!4v1735373392498!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <footer class="contact-footer">
            <div class="footer-left">
                <h4>bilikFoto.</h4>
                <p>Email: bilikfoto@gmail.com</p>
                <p>No Handphone: +62 877-8324-0504</p>
            </div>
            <div class="footer-right">
                <h4>Mulailah Pose Fotomu dengan BilikFoto</h4>
                <a href="#price">
                    <button class="open-popup-btn">Book Now!</button>
                </a>
            </div>
        </footer>
    </section>



    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <button class="close-btn" id="closeLoginModalBtn">&times;</button>
            <div class="modal-body">
                <div class="modal-image">
                    <img src="image/opsional.png" alt="Studio Background">
                </div>
                <div class="modal-form">
                    <h1>Login</h1>
                    <p>Welcome back! Please login to your account</p>
                    <form action="login.php" method="POST">
                        <label for="login-email">Email</label>
                        <input type="email" name="email" id="login-email" placeholder="Enter your email">

                        <label for="login-password">Password</label>
                        <input type="password" name="password" id="login-password" placeholder="Enter your password">

                        <!-- <div class="form-options">
                            <div>
                                <input type="checkbox" id="rememberMe">
                                <span>Remember me</span>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div> -->

                        <button type="submit" class="login-btn">Login</button>
                        <!-- <button class="regist-btn">Daftar</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <button class="close-btn" id="closeRegisterModalBtn">&times;</button>
            <div class="modal-body">
                <div class="modal-image">
                    <img src="image/opsional.png" alt="Studio Background">
                </div>
                <div class="modal-form">
                    <h1>Register</h1>
                    <p>Create your account to get started</p>
                    <form action="register.php" method="post">
                        <label for="register-email">Nama</label>
                        <input type="text" id="register-email" name="nama" placeholder="Enter your email">

                        <label for="register-email">Email</label>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email">

                        <label for="register-password">Nomor HP</label>
                        <input type="text" name="no_hp" id="" placeholder="Enter your Number Phone">

                        <label for="register-password">Password</label>
                        <input type="password" name="password" id="register-password" placeholder="Create a password">
                        <!-- 
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" placeholder="Confirm your password"> -->

                        <button type="submit" class="register-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="java.js"></script> -->
    <script>

        // Select elements for Login Modal
        const openLoginModalBtn = document.getElementById('login'); // Button ID for opening Login Modal
        const closeLoginModalBtn = document.getElementById('closeLoginModalBtn'); // Close button in Login Modal
        const loginModal = document.getElementById('loginModal'); // Login Modal

        // Select elements for Register Modal
        const openRegisterModalBtn = document.getElementById('regist'); // Button ID for opening Register Modal
        const closeRegisterModalBtn = document.getElementById('closeRegisterModalBtn'); // Close button in Register Modal
        const registerModal = document.getElementById('registerModal'); // Register Modal

        // Select elements for Booking Popup
        const openPopupBtn = document.getElementById('reservasi'); // Button ID for opening Booking Popup
        const popupForm = document.getElementById('popupForm'); // Booking Popup
        const closePopupBtn = document.getElementById('closePopup'); // Close button in Booking Popup

        // Ensure the elements exist before adding event listeners to prevent errors

        // Open Login Modal
        if (openLoginModalBtn && loginModal) {
            openLoginModalBtn.addEventListener('click', () => {
                loginModal.style.display = 'flex'; // Open login modal
            });
        }

        // Close Login Modal
        if (closeLoginModalBtn && loginModal) {
            closeLoginModalBtn.addEventListener('click', () => {
                loginModal.style.display = 'none'; // Close login modal
            });
        }

        // Open Register Modal
        if (openRegisterModalBtn && registerModal) {
            openRegisterModalBtn.addEventListener('click', () => {
                registerModal.style.display = 'flex'; // Open register modal
            });
        }

        // Close Register Modal
        if (closeRegisterModalBtn && registerModal) {
            closeRegisterModalBtn.addEventListener('click', () => {
                registerModal.style.display = 'none'; // Close register modal
            });
        }

        // Open Booking Popup
        if (openPopupBtn && popupForm) {
            openPopupBtn.addEventListener('click', () => {
                popupForm.style.display = 'flex'; // Open booking popup
            });
        }

        // Close Booking Popup
        if (closePopupBtn && popupForm) {
            closePopupBtn.addEventListener('click', () => {
                popupForm.style.display = 'none'; // Close booking popup
            });
        }

        // Close modals when clicking outside the content
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.style.display = 'none';
            }
            if (e.target === registerModal) {
                registerModal.style.display = 'none';
            }
            if (e.target === popupForm) {
                popupForm.style.display = 'none';
            }
        });
        // JavaScript untuk menutup alert
        const closeButtons = document.querySelectorAll('.close');

        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Mendapatkan elemen parent (alert) dan menyembunyikannya
                const alertBox = this.parentElement;
                alertBox.style.display = 'none';
            });
        });
    </script>

</body>

</html>