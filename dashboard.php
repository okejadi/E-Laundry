<?php 
if(!defined('akses')){echo "<h1>NOT AUTHORIZED!</h1>";die;}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-Wash</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/Lato.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/pikaday.min.css">
    <style type="text/css">
        html{
            outline: none;
            border: none;
            height: 100%;
        }
        body{
            outline: none;
            border: none;
            overflow-x: hidden;
        }
        .image{
            transition-duration: .5s;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container">
            <a class="navbar-brand logo" href="#">E-Laundry</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="home-btn">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active js-scroll-trigger" href="#harga" id="harga-btn">Harga</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Tentang Kami</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#login" id="login-btn">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page" id="main">
        <section class="portfolio-block block-intro" style="padding-bottom: 1px;">
            <h1>Selamat datang di E-Laundry!</h1>
            <div class="container">
                <div class="about-me">
                    <p>Kami menawarkan banyak fitur yang bermanfaat!</p>
                </div>
            </div>
        </section>
            <div class="portfolio-block skills container-fluid" style="padding-top: 1px; height: 100vh;">
                <div class="row" style="padding-left: 8vw;padding-right: 8vw;">
                    <div class="col-md-4 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Cuci</h3>
                                <p class="card-text">Kami menggunakan mesin cuci yang terbaik dan juga dengan sabun yang sesuai dengan tipe baju anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Setrika</h3>
                                <p class="card-text">Sekarang sudah tidak jaman lagi menyetrika dengan setrika konvensional, kami sudah menggunakan setrika uap sehingga baju anda terlihat rapih!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Cepat</h3>
                                <p class="card-text">Kami menyediakan layanan premium yang dapat selesai dalam 1 hari kerja. Bahkan jika anda mau dalam hari itu selesaipun bisa!</p>
                                <p id="harga"><br> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="padding-left: 8vw;padding-right: 8vw;">
                    <div class="col-md-4 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">REGULER</h3>
                                <p class="card-text">Per 1KG Rp.10.000,-<br>Selesai dalam 2-3 hari<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">EXPRESS</h3>
                                <p class="card-text">Rp.15.000/kg<br>Selesai dalam 1 hari<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Paket Tambahan</h3>
                                <p class="card-text">Parfum Wangi Rp5.000/5kg<br>Setrika uap Rp.Rp10.000/5kg</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading">
                    <h2 style="margin-top: 30px;height: 0px;margin-bottom: 0px;">Galeri</h2>
                </div>
                <div class="row no-gutters portfolio-block photography" style="padding-left: 8vw;padding-right: 8vw;">
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="images/laundry1.jpg"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="images/laundry2.jpg"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="images/laundry3.jpg"></a></div>
                </div>
                <div class="d-flex justify-content-center align-items-center content p-5">
                    <h3>Anda tertarik?</h3><button class="btn btn-outline-primary btn-lg ml-3" type="button"><a href="register.php">Order Sekarang!</a></button>
                </div>
                <div class="row align-items-center website gradient" style="padding: 8vw;">
                    <div class="col-md-12 col-lg-5 offset-lg-1 text-right">
                        <h3>E-Wash</h3>
                        <p>Bla bla bla bla bla bla bla</p>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div class="portfolio-laptop-mockup">
                            <div class="screen">
                                <div class="screen-content" style="background-image:url(&quot;assets/img/tech/image6.png&quot;);"></div>
                            </div>
                            <div class="keyboard"></div>
                        </div>
                    </div>
                </div>
                 <section class="portfolio-block hire-me" id="login">
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-12">
                    <form method="post" action="controller/login_proses.php">
                            <div class="text-center pt-1 pb-3" style="font-family: Roboto Regular;">
                                <h2>Login</h2>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan Password Anda" required>
                            </div>
                            <div class="col-md-12 text-center"><button class="btn btn-primary" type="submit" value="Login">LOG IN</button></div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
                <footer class="page-footer">        
                        <div class="links"><a href="#">Tentang Kami</a><a href="#">Copyright E-Laundry</a></div>
                        <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#" id="duit" utang=""><i class="icon ion-social-twitter"></i></a></div>
                </footer>
            </div>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script type="text/javascript">
        <?php if(isset($_GET['msg'])=="err"){ ?>
            $(document).ready(function(){
                alert('USERNAME / PASSWORD SALAH!')
            })
        <?php } ?>
        $(function(){
            $("#harga-btn").click(function(){
                $("html,body").animate({ scrollTop: $('#harga').offset().top }, 1000);
                console.log("click");
                $("#navbarNav").attr("class","navbar-collapse collapse");
                return false;
            });
            $("#login-btn").click(function(){
                $("html,body").animate({ scrollTop: $('#login').offset().top }, 1500);
                console.log("click");
                $("#navbarNav").attr("class","navbar-collapse collapse");
                return false;
            });
            $("#home-btn").click(function(){
                $("html,body").animate({ scrollTop: $('#main').offset().top }, 1500);
                console.log("click");
                $("#navbarNav").attr("class","navbar-collapse collapse");
                return false;
            });
        });
    </script>
</body>
</html>