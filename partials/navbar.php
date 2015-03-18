<?php 
session_start();
    $file = "log.txt";
    $ip = $_SERVER['REMOTE_ADDR'];
    $bs = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set('Asia/Jakarta');
    $dt = date("l dS \of F Y h:i:s A");
    $handle = fopen($file, 'a');
    fwrite($handle, "IP Address: ");
    fwrite($handle, "$ip");
    fwrite($handle, "\n");
    fwrite($handle, "Browser: ");
    fwrite($handle, "$bs");
    fwrite($handle, "\n");
    fwrite($handle, "Waktu: ");
    fwrite($handle, "$dt");
    fwrite($handle, "\n");
    fclose($handle);
 ?>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="navbar-wrapper">
                    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                        class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php">IBTEAM : CTF</a>
                            </div>
                            <div class="navbar-collapse collapse" style="overflow:visible;">
                                <ul class="nav navbar-nav">
                                    <li><a title="Home" href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li><a title="Mission" href="mission.php"><i class="fa fa-flag"></i></a></li>
                                    <li><a title="Scoreboard" href="scoreboard.php"><i class="fa fa-sitemap"></i></a></li>
                                    <li><a title="Contact" href="contact.php"><i class="fa fa-envelope"></i></a></li>
                                    <li><a title="Rules" href="info.php"><i class="fa fa-info-circle"></i></a></li>
                                    <li><a title="Prize" href="prize.php"><i class="fa fa-gift"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                  <?php if(!empty($_SESSION['status']) == "on"){ ?>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi , <?=$_SESSION['nama']?>
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <li><a href='profile.php'><i class='fa fa-user'></i>   Profile</a></li>
                                                <li><a href='logout.php'><i class='fa fa-power-off'></i>   Logout</a></li>
                                                 <?php   }else{  ?>
                                                <li><a href="login.php"><i class="fa fa-lock"></i>   Login</a></li>
                                                <li><a href="register.php"><i class="fa fa-pencil-square-o"></i>   Register</a></li>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>