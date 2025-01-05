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
    <style>
        .price-list-section {
            padding: 20px;
            background-color: #fff;
            text-align: center;
        }

        .title {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .price-list-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .price-card {
            background-color: #202020;
            color: #D6F849;
            padding: 20px;
            border-radius: 30px;
            width: 300px;
            position: relative;
            text-align: left;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .price-card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .price-card .best-seller {
            top: -10px;
            left: 10px;
            float: right;
            background-color: #D6F849;
            color: #191919;
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            width: 90px;
            text-align: center;
        }

        .price-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .price-card p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .price-card ul {
            list-style-type: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .price-card ul li {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .book-now-btn {
            background-color: #D6F849;
            color: #191919;
            border: none;
            padding: 10px 15px;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            height: 50px;
            text-align: center;
            
        }

        .book-now-btn:hover {
            background-color:rgb(197, 237, 104);
        }

    </style>
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
        <div class="hero-nav" style="background-image: url('image/bgweb.png')">
            <div class="nav">
                <div class="logo">
                    <a href="index.php"><img src="image/logo.png" alt=""></a>
                </div>
                <ul class="navmenu">
                    <li><a href="#aboutme">ABOUT</a></li>
                    <li><a href="#price">PRICES</a></li>
                    <li><a href="#testimoni">TESTIMONIALS</a></li>
                    <li><a href="#bagiancontact">CONTACT</a></li>
                </ul>
                <div class="auth" style="display:flex">
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
    <section class="why-us-section" id="aboutme">
        <div class="images-container">
            <img src="image/image-3.svg" alt="Model 1" class="image">
            <img src="image/image-4.svg" alt="Model 2" class="image">
            <img src="image/image-5.svg" alt="Model 3" class="image">
        </div>
        <div class="text-container">
            <h2>Why us?<br>What makes BilikFoto so special?</h2>
            <p>
            Di BilikFoto, kami percaya setiap momen layak diabadikan dengan sempurna. Itulah mengapa kami menghadirkan pengalaman yang berbeda: mulai dari teknologi kamera canggih, pencahayaan profesional, hingga desain studio yang stylish dan nyaman. Selain itu, Anda memiliki kendali penuh atas setiap foto yang diambil, menjadikan setiap hasilnya unik dan personal. Dengan suasana yang mendukung kreativitas dan privasi. 
            BilikFoto lebih dari sekadar studio, kami adalah tempat di mana cerita Anda diabadikan dengan keindahan yang tak tertandingi.
            </p>
        </div>
    </section>

    <!-- PRICES -->
    <section class="price-list-section">
    <h1 class="title">Price List</h1>
    <div id="price" class="price-list-container">

        <div class="price-card">
            <span class="best-seller">Best Seller</span> 
            <h2>40rb <span>/paket</span></h2>
            <h3>Packet Basic</h3>
            <p>Paket basic self photo session</p>
            <br>
            <ul>
                <li>✔️ 1/2 person</li>
                <li>✔️ 1 extra printed photo</li>
                <li>✔️ 15 mins photoshot</li>
                <li>✔️ 10 mins photo selection</li>
                <li>✔️ Choose colour & frame</li>
                <li>✔️ All digital photos</li>
            </ul>
            <?php
                if (isset($_SESSION['user_id'])) {

                ?>
                    <button id="reservasi" class="book-now-btn">Booking sekarang</button>
                <?php
                } else {
                ?>
                    <a href="#login"><button class="book-now-btn">Login First</button></a>
                <?php
                }
                ?>
        </div>

        <div class="price-card">
            <span class="best-seller">Best Seller</span>
            <h2>55rb <span>/paket</span></h2>
            <h3>Packet Basic + 
                <br>Additionals 1</h3>
            <p>Paket basic self photo session</p>
            <ul>
                <li>✔️ 4 persons max</li>
                <li>✔️ 1 extra printed photo</li>
                <li>✔️ 15 mins photoshot</li>
                <li>✔️ 10 mins photo selection</li>
                <li>✔️ Choose colour & frame</li>
                <li>✔️ All digital photos</li>
            </ul>
            <?php
                if (isset($_SESSION['user_id'])) {

                ?>
                    <button id="reservasi" class="book-now-btn">Booking sekarang</button>
                <?php
                } else {
                ?>
                    <a href="#login"><button class="book-now-btn">Login First</button></a>
                <?php
                }
                ?>
        </div>

        <div class="price-card">
            <span class="best-seller">Best Seller</span>
            <h2>65rb <span>/paket</span></h2>
            <h3>Packet Basic 
                <br>+ Additionals 2</h3>
            <p>Paket basic self photo session</p>
            <ul>
                <li>✔️ 4 persons max</li>
                <li>✔️ 2 extra printed photo</li>
                <li>✔️ 15 mins photoshot</li>
                <li>✔️ 10 mins photo selection</li>
                <li>✔️ Choose colour & frame</li>
                <li>✔️ All digital photos</li>
            </ul>
            <?php
                if (isset($_SESSION['user_id'])) {

                ?>
                    <button id="reservasi" class="book-now-btn">Booking sekarang</button>
                <?php
                } else {
                ?>
                    <a href="#login"><button class="book-now-btn">Login First</button></a>
                <?php
                }
                ?>
        </div>
    </div>
    </section>
            
    <!-- TESTIMONI CUYYY -->
    <div id="testimoni">
        <section class="testimonials-section">
        <h2>Testimonials</h2>
        <div class="testimonials-container">
            <div class="testimonials-carousel">
                <div class="testimonial">
                    <img src="image/testi1.svg" alt="Testimonial 1">
                    <h3>Winda & Ayu</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – Winda & Ayu</p>
                </div>
                <div class="testimonial">
                    <img src="image/testi2.svg" alt="Testimonial 2">
                    <h3>Rizal & Citra</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – Rizal & Citra</p>
                </div>
                <div class="testimonial">
                    <img src="image/testi3.svg" alt="Testimonial 3">
                    <h3>Aliyah & Mutia</h3>
                    <p>Pengalaman yang luar biasa! Tim di BilikFoto Studio sangat profesional dan ramah. Saya merasa sangat nyaman selama sesi foto dan hasilnya luar biasa! Terima kasih BilikFoto! – Aliyah & Mutia</p>
                </div>
            </div>
        </div>
        </section>
    </div>
    
    <!-- FORM PEMESANAN -->
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
    
    <!-- BAGIAN KONTAK CUY -->
    <section class="contact-section" id="bagiancontact">
        <h2 style="text-align:center">Contact Us</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Hubungi Kami</h3>
                <p>
                    Ada yang ingin ditanyakan atau disampaikan? 
                    Kami di sini untuk Anda! 
                    <br>
                    Mulai dari informasi layanan, panduan pemesanan, hingga cerita seru tentang pengalaman Anda di bilikfoto. Jangan sungkan untuk menghubungi kami. 
                    <br>
                    Tim kami siap memberikan solusi terbaik dengan senyuman!                 
                </p>
                <ul>
                    <li>📞 +62 877-8324-0504</li>
                    <li>📍 Jl. Abdulrahman Saleh No.570, Manyaran, Kota Semarang</li>
                    <li>📧 fotobilik@gmail.com</li>
                </ul>
                <form class="contact-form">
                    <h4>Send us a message</h4>
                    <input type="text" placeholder="Nama Lengkap">
                    <input type="email" placeholder="Alamat Email">
                    <input type="tel" placeholder="No Handphone">
                    <textarea placeholder="Pesan"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
            <div class="contact-map">
                <!-- Map embed -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0502188514292!2d110.3791018743102!3d-7.003369368593513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b1c32fbb1b9%3A0x38e30aff77868931!2sJl.%20Abdulrahman%20Saleh%20No.570%2C%20Manyaran%2C%20Kec.%20Semarang%20Barat%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050147!5e0!3m2!1sid!2sid!4v1736080266670!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <footer class="contact-footer">
            <div class="footer-left">
                <h4>bilikfoto.</h4>
                <p>Email: fotobilik@gmail.com</p>
                <p>No Handphone: +62 877-8324-0504</p>
            </div>
            <div class="footer-right">
                <h4>Abadikan Momen Tak Terlupakan Bersama bilikfoto.</h4>
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
                    <p>Create your account to get started!</p>
                    <form action="register.php" method="post">
                        <label for="register-email">Nama</label>
                        <input type="text" id="register-email" name="nama" placeholder="Enter your email">

                        <label for="register-email">Email</label>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email">

                        <label for="register-password">Nomor HP</label>
                        <input type="text" name="no_hp" id="" placeholder="Enter your Number Phone">

                        <label for="register-password">Password</label>
                        <input type="password" name="password" id="register-password" placeholder="Create a password">

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