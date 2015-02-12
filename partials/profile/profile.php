<?php if(empty($_SESSION['nama'])){ 
    echo "<META http-equiv='refresh' content='0;URL=login.php'>";
} else{ ?>
   <div class="col-md-8">       
    <h2>About <?=$_SESSION['nama']?> </h2>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Team</th>
                      <th>Points</th> 
                    <!--  <th>Total Submit</th> -->
                      <th>Status</th>                                         
                  </tr>
              </thead>   
              <tbody>
                <tr>
<?php
$label = "label-default";
$user = filter($_SESSION['nama']);
$qry =mysql_query("select * from player where username='$user' ");
$fetch = mysql_fetch_array($qry);
if($fetch['points']>=50){
 $label= "label-primary";
}elseif($fetch['points']>=300){
 $label= "label-danger";
}elseif($fetch['points']>=700){
$label= "label-warning";  
}elseif($fetch['points']>=900){
$label="label-success";   
}
       
$labelstatus="label-success";   
$status="Active";
if($fetch['status'] == 0){
 $labelstatus="label-danger";
$status="Banned";
}


?>
                    <td><?=$fetch['team']?></td>
                    <td><span class="label <?=$label?>"><?=$fetch['points']?></span>
                    <!--<td><span class="label label-primary">20x</span></td>-->
                    <td><span class="label <?=$labelstatus?>"><?=$status?></span>
                    </td>                                       
                </tr>                      
              </tbody>
            </table>
            
    
        <h2> Mission Solved </h2>
            
        <?php
        
                if($fetch['idsoalsolv'] != NULL){
                $idsoal=$fetch['idsoalsolv']; 
                $pecah = explode(",", $idsoal);
          ?>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Kategori</th>
                      <th>Misi</th>
                      <th>Points</th>                                    
                  </tr>
              </thead>   
                   
       
              <tbody>
               <?php
					$labelpoint = "label-success";
                    for($i=0;$i<sizeof($pecah);$i++){
                    $qry = mysql_query("select * from soal where idsoal='$pecah[$i]'");
                    while($fetch = mysql_fetch_array($qry)){ 
					if($fetch['pointsoal'] == 0){
					$labelpoint = "label-danger";
					}
                    echo "<tr>";
                    echo "<td>".$fetch['catsoal']."</td>";
                    echo "<td><a href='missions/".$fetch['idsoal']."'>".$fetch['nmsoal']."</a></td>";
                    echo "<td><span class='label ".$labelpoint."'>";
					if($fetch['pointsoal'] == 0){
						echo "Time Out!";
					}else{
						echo $fetch['pointsoal'];
					}
					echo "</span></td>";                        
                    echo "</tr>";                     
          
             }}  
                  ?>
    </tbody>
</table> 
            <?php }} ?>

            
</div>