<?php
require "includes/filechange.php";
require "includes/db.php";
$con=array('email');
$key=array('james.kirk@sf.sf');
$fields=array('id','login','join_date');
$query=B::selectFromBase("users",$fields,null,null);
while ($row = $query->fetch(PDO::FETCH_LAZY))
{
    print_r($row);
}
?>