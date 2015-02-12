<?php 
$url = "http://localhost/IBTEAM-CTF/";
function filter($data) {
    $data = htmlspecialchars(trim(htmlentities(strip_tags($data))));

    if (get_magic_quotes_gpc())
        $data = stripslashes($data);

    $data = mysql_real_escape_string($data);

    return $data;
}
define ('DB_SERVER', 'localhost');
define ('DB_USERNAME', 'root');
define ('DB_PASSWORD', '');
define ('DB_DATABASE', 'ctfibt');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
$database = mysql_select_db(DB_DATABASE);


?>