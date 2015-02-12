<div class="col-md-8">       
    <h2>Full Score Board</h2>
            <table class="table well table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Rank</th>
                      <th>Username</th>
                      <th>Team</th>
                      <th>Points</th> 
                      <th>Status</th>                                         
                  </tr>
              </thead>   
              <tbody>
               
                <?php 


$per_page = 10;
$page_query = mysql_query("SELECT COUNT(*) FROM player");
$pages = ceil(mysql_result($page_query, 0) / $per_page);


if(isset($_GET['page'])){
    $getpage = filter($_GET['page']);
    $getpage;
}else{
   $getpage=1;
}

$start = ($getpage - 1) * $per_page;


$query = mysql_query("select * from player order by points desc limit $start, $per_page");
if($start == 0){
$i=1;
}else{
$i=+$start+1;   
}

while($data = mysql_fetch_array($query)){

    
$labelstatus="label-success";   
$status="Active";
if($data['status'] == 0){
 $labelstatus="label-danger";
$status="Banned";
}
$labelpoint ="label-default";
/** Atur Label Point **/
if($data['points']>=100){
 $labelpoint= "label-primary";
}
if($data['points']>=300){
 $labelpoint= "label-danger";
}
if($data['points']>=600){
$labelpoint= "label-warning";  
}
if($data['points']>=900){
$labelpoint="label-success";   
}  
                echo "<tr>";
                echo"<td>".$i."</td>";
                echo"<td><a href='".$url."user/".filter($data['username'])."'>".filter($data['username'])."</a></td>";
                echo"<td>".filter($data['team'])."</td>";
                echo"<td><span class='label ".$labelpoint."'>".filter($data['points'])."</span>";
                echo"<td><span class='label ".$labelstatus."'>".$status."</span>";
                echo"</td>";                                    
                echo"</tr>";       
    $i++;
}
if($pages >= 1 && $getpage <= $pages){
	for($x=1; $x<=$pages; $x++){
        if($x == $getpage){
            $active = "active";
        }else{
            $active = "";   
        }
		echo ($x == $getpage) ? '<b><a class="'.$active.' btn btn-default" href="?page='.$x.'">'.$x.'</a></b> ' : '<a class="'.$active.' btn btn-default" href="?page='.$x.'">'.$x.'</a> ';
	}
}
                  
                  ?>
                </tbody>
            </table>
</div>