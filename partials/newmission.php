
<div class="col-md-6">
        <h3> New Mission </h3>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Point</th>
                      <th>Misi</th>
                      <th>Kategori</th>                                        
                  </tr>
              </thead>   
              <tbody>
<?php
$query=mysql_query("select * from soal order by idsoal desc");
$count = 0;
while($data=mysql_fetch_array($query)){
$labelpoint ="label-default";
/** Atur Label Point **/
if($data['pointsoal']==100){
 $labelpoint= "label-primary";
}elseif($data['pointsoal']==200){
 $labelpoint= "label-danger";
}elseif($data['pointsoal']==300){
$labelpoint= "label-warning";  
}elseif($data['pointsoal']==400){
$labelpoint="label-success";   
}  

if($data['display'] == 1 && $count<5){
                echo "<tr>";
                echo "<td><span class='label ".$labelpoint."'>".$data['pointsoal']."</span></td>";
                echo "<td><a href='".$url."missions/".$data['idsoal']."'>".$data['nmsoal']."</a></td>";
                echo "<td>".$data['catsoal']."</td>";                                     
                echo "</tr>";
				$count++;
}				
}    ?>                                              
              </tbody>
            </table>
            <a href="mission.php"><span class="btn btn-default">All Mission</span></a>
         </div>