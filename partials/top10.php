<?php $query=mysql_query( "select * from player order by points desc limit 10"); ?>
<div class="col-md-4 score">
    <h3> Top 10 </h3>
    <table class="table well table-striped table-condensed">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Team</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; while($data=mysql_fetch_array($query)){ 
    
$labelpoint ="label-default";
/** Atur Label Point **/
if($data['points']>=100){
 $labelpoint= "label-primary";
}
if($data['points']>=200){
 $labelpoint= "label-danger";
}
if($data['points']>=300){
$labelpoint= "label-warning";  
}
if($data['points']>=400){
$labelpoint="label-success";   
}  
    echo "<tr>"; 
    echo "<td>".$i. "</td>"; 
    echo "<td><a href='".$url."user/".mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data[ 'username']))))."'>".mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data[ 'username'])))). "</a></td>"; echo "<td>".mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data[ 'team'])))). "</td>"; 
echo "<td><span class='label ".$labelpoint."'>".mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data[ 'points'])))). "</span>"; 
echo "</tr>"; $i++; } ?>
        </tbody>
    </table>
    <a href="<?=$url?>scoreboard.php"><span class="btn btn-default">Full Scoreboard</span></a> 
</div>
