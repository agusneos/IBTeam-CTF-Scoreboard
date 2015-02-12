
<!DOCTYPE html>
<html lang="en">
<?php include "partials/head.php"; ?>
<body>
<!-- Navbar -->
<?php 
if(isset($_GET['username'])){
$user=$_GET['username'];
$query= mysql_query("select * from player where username='$user' ");
$calc = mysql_num_rows($query);
if($calc>0){   
    $data = mysql_fetch_array($query);
    
include "partials/navbar2.php"; ?>
<!-- ./Navbar -->
    <div class="main">
        <div class="col-md-12 content">    
<!-- profile -->

<?php 
    include "partials/profile/profile2.php" ;
}else{
echo "<META http-equiv='refresh' content='0;URL=../profile.php'>";
}
}else{
    include "partials/navbar.php";
    ?>
    <!-- ./Navbar -->
    <div class="main">
        <div class="col-md-12 content">
<!-- profile -->
   
<?php include "partials/profile/profile.php" ;    
} ?>
<!-- ./profile -->
        
<!-- Top10 Score -->
<?php include "partials/top10.php" ;?>
<!-- ./Top10 Score -->
       
        </div><!-- ./End Content -->
    </div> <!-- ./End Main -->
    
<!-- Footer -->    
<?php include "partials/footer.php" ;?>    
<!-- ./Footer -->

</body>
</html>
