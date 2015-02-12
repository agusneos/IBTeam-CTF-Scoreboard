        <div class="col-md-6">
        <h3> Latest Solved </h3>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Username</th>
                      <th>Misi</th>
                      <th>Tanggal</th>
                      <th>Points</th>                                          
                  </tr>
              </thead>   
              <tbody>
               <?php
$query=mysql_query("select * from latestsolved order by id desc limit 5");

while($data=mysql_fetch_array($query)){
$nmsoal=$data['nmsoal'];
$qry =mysql_query("select * from soal where nmsoal='$nmsoal' ");
$fetch = mysql_fetch_array($qry);
    
$labelpoint ="label-default";
/** Atur Label Point **/
if($data['pointsoal']==0){
$labelpoint= "label-danger";
}elseif($data['pointsoal']>=100){
 $labelpoint= "label-primary";
}elseif($data['pointsoal']>=200){
 $labelpoint= "label-danger";
}elseif($data['pointsoal']>=300){
$labelpoint= "label-warning";  
}elseif($data['pointsoal']>=400){
$labelpoint="label-success";   
}  
                echo "<tr>";
                echo "<td><a href='".$url."user/".$data['username']."'>".$data['username']."</td>";
                echo "<td><a href='".$url."missions/".$fetch['idsoal']."'>".$data['nmsoal']."</a></td>";
                echo "<td>".$data['submited']."</td>";  
                echo "<td><span class='label ".$labelpoint."'>";
				if($fetch['pointsoal'] == 0){
						echo "Time Out!";
					}else{
						echo $data['pointsoal'];
					}
				echo "</span></td>";
                echo "</tr>";  
}    ?>              
              </tbody>
            </table>
             <!--<span class="btn btn-default">Latest Solved</span>-->
         </div>