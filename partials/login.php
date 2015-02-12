<?php
if(!empty($_SESSION['status']) == "on"){
    echo "<META http-equiv='refresh' content='0;URL=profile.php'>";
}
$_SESSION['nongce'] = $nonce = md5('salt'.microtime());

if(isset($_POST['submit'])){
$user = filter($_POST['username']);
$pass = md5(filter($_POST['password']));

if ($_SESSION['nongce'] != $nonce) {
    // some error condition
    die("<a href='index.php'>Home</a>");
} else {
    // clear the session nonce
    $_SESSION['nongce'] = null;
}


// continue processing

$ceklogin = mysql_query("select * from player where username='$user' AND password='$pass' ");    

    
    if(mysql_num_rows($ceklogin)>0){
	$data = mysql_fetch_array($ceklogin);
	if($data['status'] == 0){
 echo "<script>alert('Account Banned/Not Activated');</script>";
 echo "<META http-equiv='refresh' content='0;URL=login.php'>";
 die();
	}
        $_SESSION['status'] = "on";
        $_SESSION['nama'] = $user;
        echo "<META http-equiv='refresh' content='0;URL=profile.php'>";
    }else{
 echo "<script>alert('Username/Password Salah');</script>";   
	}	  
}


?>
   

<div class="col-md-8">       
    <h2>Login</h2>
<div class="well"> 
    <div class="col-md-4">
<div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-sm btn-success" value="Login" />
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
</div>       
</div>