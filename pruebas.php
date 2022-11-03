<?php
session_start();
$users = $_SESSION['newsession']="zg";


var_dump( $_SESSION);
echo "<br>".md5("123")."<br>eaadcdd5c9fa88aab2bcdda95d026f<br>";
var_dump( $users);

?>