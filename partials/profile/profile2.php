<div class="col-md-8">
    <h2>About <?=$data['username']?> </h2>
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
$qry=mysql_query( "select * from player where username='$user' "); 
$fetch=mysql_fetch_array($qry); 
$label="label-default" ; 
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
                <td>
                    <?=$fetch['team']?>
                </td>
                <td><span class="label <?=$label?>"><?=$fetch['points']?></span>
                    <!--<td><span class="label label-primary">20x</span></td>-->
                    <td><span class="label <?=$labelstatus?>"><?=$status?></span>
                    </td>
            </tr>
        </tbody>
    </table>


    <h2> Mission Solved </h2>

    <?php if($fetch['idsoalsolv'] !=NULL){ $idsoal=$fetch['idsoalsolv']; $pecah=explode( ",", $idsoal); ?>
    <table class="table well table-striped table-condensed">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Misi</th>
                <th>Points</th>
                <th>Level</th>
                <th>Submited</th>
            </tr>
        </thead>


        <tbody>
            <?php for($i=0;$i<sizeof($pecah);$i++){ 
        $qry=mysql_query( "select * from soal where idsoal='$pecah[$i]' "); 
        
        while($fetch2=mysql_fetch_array($qry)){ 

            
$labelpoint ="label-default";
/** Atur Label Point **/
$info="";
if($fetch2['pointsoal'] == 0){
$info = "Time Out!";
$labelpoint= "label-danger";
}elseif($fetch2['pointsoal']>100){
 $labelpoint= "label-primary";
}elseif($fetch2['pointsoal']>200){
 $labelpoint= "label-danger";
}elseif($fetch2['pointsoal']>300){
$labelpoint= "label-warning";  
}elseif($fetch2['pointsoal']>400){
$labelpoint="label-success";   
}            
            
/* Atur Level */
if($fetch2['levelsoal'] == 1){
 $level = "Easy";
$label = "label-primary";   
}elseif($fetch2['levelsoal'] == 2){
 $level = "Medium";
$label = "label-warning";
}elseif($fetch2['levelsoal'] == 3){
 $level = "Hard";
$label = "label-danger";
}else{
 $level = "Extra";
$label = "label-danger";
}

$nmsoal = $fetch2['nmsoal'];
$qry2=mysql_query(" select * from latestsolved where username='$user' AND nmsoal='$nmsoal' ");
$data2=mysql_fetch_array($qry2);
            echo "<tr>"; 
            echo "<td>".$fetch2['catsoal']. "</td>";
            echo "<td><a href='".$url."missions/".$pecah[$i]."'>".$fetch2['nmsoal']. "</a></td>"; 
            echo "<td><span class='label ".$labelpoint."'>";
			if($fetch2['pointsoal'] == 0){
			echo $info;
			}else{
			echo $fetch2['pointsoal'];
			}			
			echo "</span></td>"; 
            echo "<td><span class='label ".$label."'>".$level."</span></td>"; 
            echo "<td><span class='label label-default'>".$data2['submited']. "</span></td>"; 
            echo "</tr>"; }} ?>
        </tbody>
    </table>
    <?php } ?>


</div>