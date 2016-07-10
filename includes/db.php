<?php
function checkLogin($login){
    $mysqli= new mysqli("localhost","mysql","mysql","Library");
    $mysqli->query("SET NAMES 'utf8'");
    $res = $mysqli->query ("SELECT * FROM `users` WHERE `login`='$login'");
    $mysqli->close();
    if ($res->num_rows) return true; else return false;
}
function checkMail($email){
    $mysqli= new mysqli("localhost","mysql","mysql","Library");
    $mysqli->query("SET NAMES 'utf8'");
    $res = $mysqli->query ("SELECT * FROM `users` WHERE `email`='$email'");
    $mysqli->close();
    if ($res->num_rows) return true; else return false;
}
function checkPassword($logpas){
    $mysqli= new mysqli("localhost","mysql","mysql","Library");
    $mysqli->query("SET NAMES 'utf8'");
    $login=$logpas[1];
    $res = $mysqli->query ("SELECT * FROM `users` WHERE `login`='$logpas[1]'");
    $row=$res->fetch_assoc();
    $mysqli->close();
    return password_verify($logpas[2],$row['password']);
}
class B{
    public $db_login="mysql";
    public $db_password="mysql";
    public $db_host="localhost";
    public $db_name="Library";
    public static function insert($table_name,$fields,$data){
        $db=new B();
        $mysqli= new mysqli($db->db_host,$db->db_login,$db->db_password,$db->db_name);
        $mysqli->query("SET NAMES 'utf8'");
        $query="INSERT INTO `$db->db_name`.`$table_name` (";
        for ($i=0;$i<count($fields)-1;$i++){
            $query=$query."`$fields[$i]`".", ";
        }
        $last=count($fields)-1;
        $query=$query."`$fields[$last]`".") VALUES (";
        for ($i=0;$i<count($data)-1;$i++){
            $query=$query."'$data[$i]'".", ";
        }
        $last=count($data)-1;
        $query=$query."'$data[$last]'".")";
        $success = $mysqli->query ($query);
        $mysqli->close();
        return $success;
    }
}
session_start();
?>