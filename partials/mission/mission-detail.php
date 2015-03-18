<?php 
$idsoal=filter($_GET['id']);
$_SESSION['nongce'] = $nonce = md5('salt'.microtime());
if(isset($_POST['submit'])){
// check the nonce
if ($_SESSION['nongce'] != $nonce) {
    // some error condition
    die("<META http-equiv='refresh' content='0;URL=../mission.php'>");
} else {
    // clear the session nonce
    $_SESSION['nongce'] = null;
}

// continue processing
$jawaban = filter($_POST['flag']);
$nama = filter($_SESSION['nama']);
$query = mysql_query("select * from soal where flagsoal='$jawaban' && idsoal='$idsoal' ");
$calc = mysql_num_rows($query);
    if($calc>0){

    $data=mysql_fetch_array($query);
		    if($data['display'] == 0 ){
			die("This Not Opened");
		}
    $qry = mysql_query("select * from player where username='$nama' ");
    $fetch = mysql_fetch_array($qry);
    $idsolved=$fetch['idsoalsolv'].",".$data['idsoal'];
    $totalpoin=$fetch['points']+$data['pointsoal'];
    $pecah = explode(",",$fetch['idsoalsolv']);
    $totalsolved = $data['totalsolved']+1;
        $batas = sizeof($pecah);
        for($i=0;$i<$batas;$i++){
        if($pecah[$i] == $data['idsoal']){
         die("<script>alert('Anda Telah Menyelesaikan Soal ini');</script>
         <META http-equiv='refresh' content='0;URL=../mission.php'>");   
        }}
    $dt = date(" d-M-h:i A");
	$info = "Selamat Anda Mendapatkan Flag";
	if($data['pointsoal'] == 0 || $data['display'] == 0 ){
	$info = "Selamat Anda Mendapatkan Flag , Tapi Waktu Sudah Habis +0 Point";
	}
    mysql_query("update player set idsoalsolv='$idsolved',points='$totalpoin' where username='$nama' ") or die("Gak Masuk Update".mysql_error());
    mysql_query("insert into latestsolved VALUES ('','".$fetch['username']."','".$data['nmsoal']."','".$data['pointsoal']."','".$dt."')") or die("Gak Masuk Insert".mysql_error());
    mysql_query("update soal set totalsolved='$totalsolved' where flagsoal='$jawaban' ") or die("Gak Masuk total Solved".mysql_error());
     echo "<script>alert('$info');</script>"; 
    
    }else{
    $qry = mysql_query("select * from player where username='$nama' ");
    $fetch = mysql_fetch_array($qry);
    $pecah = explode(",",$fetch['idsoalsolv']);
    $batas = sizeof($pecah);    
    for($i=0;$i<$batas;$i++){
        if($pecah[$i] == $idsoal){
         die("<script>alert('Anda Telah Menyelesaikan Soal ini');</script>
         <META http-equiv='refresh' content='0;URL=../mission.php'>");   
        }}
     echo "<script>alert('Flag Salah');</script>";   
    }
}

if(isset($_GET['id'])){

$idsoal=filter($_GET['id']);
$query= mysql_query("select * from soal where idsoal='$idsoal' ");
$calc = mysql_num_rows($query);

    if($calc>0){   
    $data = mysql_fetch_array($query);
	
    }else{
     die( "<META http-equiv='refresh' content='0;URL=../mission.php'>");   
    }
	if($data['display'] == 0){
	 die( "<META http-equiv='refresh' content='0;URL=../mission.php'>");   
	 }
	
?>
<div class="col-md-8">       
    <h2><?=$data['nmsoal'];?></h2>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#description" data-toggle="tab">Keterangan Misi:</a></li>
            <li class=""><a href="#solved-by" data-toggle="tab">Player Selesai:</a></li>
        </ul>
    <div class="tab-content" style="margin-top:10px;">
            <div class="tab-pane fade active in" id="description">
                <?php if(!empty($_SESSION['status'])){    ?>
                <div class="well">
                    <?=$data['descsoal'];?>
                    <br />
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                    <input type="text" name="flag" placeholder="Submit Flag" />
                    <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
                    <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </form>
                </div>
    
                <?php  }else{ ?>
                <div class="alert alert-info">
                    Silahkan <a href="../login.php">Log in</a> Terlebih dahulu untuk melihat Misi.
                </div>
                <?php }}else{
                echo "<META http-equiv='refresh' content='0;URL=../mission.php'>";   
}
                ?>
                <!-- Kalau udah Login -->
               
                 
                <!-- Kalau udah login -->
            </div>
        <div class="tab-pane fade" id="solved-by">
            <table class="table table-striped table-condensed profile-exlist-table">
                <thead>
                    <tr>
                        <th class="user-col">Player</th>
                        <th class="date-col nowrap">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $namasoal = $data['nmsoal'];
                $qryt = mysql_query("select * from latestsolved where nmsoal='$namasoal' ");    
                if(mysql_num_rows($qryt)>0){
                while($fetching = mysql_fetch_array($qryt)){
               $nama = $fetching['username'];
                    echo "<tr>";
                    echo "<td> <a class='label label-success' href='".$url."user/".$nama."'>".$nama."</a></td>";
                    echo "<td><span class='label label-default'>".$fetching['submited']."</span></td>";
                    echo "</tr>";
                    }}  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>