 <div class="col-md-8">
        <h2>All Mission</h2>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Kategori</th>
                      <th>Misi</th>
                      <th>Total Solved</th>
                      <th>Points</th>
                      <th>Level</th>                                          
                  </tr>
              </thead>   
              <tbody>
                
        <?php
$query = mysql_query("select * from soal order by catsoal");
while($data = mysql_fetch_array($query)){
    

$labelsolved ="label-default"; 
  if($data['totalsolved']>5){  
 $labelsolved="label-warning";
  }elseif($data['totalsolved']>10){ 
  $labelsolved="label-danger";  
  }elseif($data['totalsolved']>20){
  $labelsolved="label-primary";
  }elseif($data['totalsolved']>30){
  $labelsolved="label-success";   
  }
    
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
    
/** Atur Level Soal **/
if($data['levelsoal'] == 1){
 $level = "Easy";
$label = "label-primary";   
}elseif($data['levelsoal'] == 2){
 $level = "Medium";
$label = "label-warning";
}elseif($data['levelsoal'] == 3){
 $level = "Hard";
$label = "label-danger";
}else{
 $level = "Extra";
$label = "label-danger";
}
    
    if($data['display'] == 1 ){
               echo " <tr>";
                echo " <td>".$data['catsoal']."</td>";
                echo " <td><a href='missions/".$data['idsoal']."'>".$data['nmsoal']."</a></td>";
                 echo " <td><span class='label ".$labelsolved."'>".$data['totalsolved']."</span></td>";
                  echo "  <td><span class='label ".$labelpoint."'>".$data['pointsoal']."</span></td>";
                    echo "<td><span class='label ".$label."'>".$level."</span></td>";                                                
                echo "</tr>";
	}
}        ?>                                  
              </tbody>
            </table>
             
         </div>