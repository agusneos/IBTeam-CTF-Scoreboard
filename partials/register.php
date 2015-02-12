<?php

$_SESSION['nongce'] = $nonce = md5('salt'.microtime());

if(isset($_POST['submit'])){
$idplayer = "";
$user = filter($_POST['username']);
$pass = md5(filter($_POST['password']));
$email = filter($_POST['email']);
$team = filter($_POST['team']);
$status = 1;
$solved = 0;
$points = 0;
$idsoalsolv= "0";
$ip = filter($_SERVER['REMOTE_ADDR']) ;

// check the nonce
if ($_SESSION['nongce'] != $nonce) {
    // some error condition
    die("<a href='index.php'>Home</a>");
} else {
    // clear the session nonce
    $_SESSION['nongce'] = null;
}

// continue processing

$cek =mysql_query("select * from player where username='$user' "); 
$calc = mysql_num_rows($cek);
$cek2 = mysql_query("select * from player where email='$email' "); 
$calc2 = mysql_num_rows($cek2);
    if($calc > 0){
        echo "<div class='alert alert-danger'><h2>Username sudah ada yang pakai. Ulangi lagi</h2></div>";
        die();
    }elseif($calc2 > 0){
        echo "<div class='alert alert-danger'><h2>Email sudah ada yang pakai. Ulangi lagi</h2></div>";
        die();  
    }

$jos =mysql_query("insert into player VALUES ('".$idplayer."','".$user."','".$pass."','".$team."','".$email."','".$status."','".$solved."','".$points."','".$ip."','".$idsoalsolv."')");

if($jos){
    echo "<div class='alert alert-success'><h2>GGWP</h2></div>";
   // echo "<meta name='http-equiv' url=register.php content=1 />");
}else{
 echo "<h2 style='display:none'>".mysql_error()."</h2>";   
}
    
}
?>

<div class="col-md-8">       
    <h2>Register</h2>
<div class="well"> 
    <div class="col-md-4">
<div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Team" name="team" type="text" value="">
                                </div>
                                <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-sm btn-success" value="Register">
                            </fieldset>
                        </form>
                    </div>
                </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />   
<br />   
<br />  
<br />  
</div>       
</div>