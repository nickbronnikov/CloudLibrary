<?php
$a=array("NASA","Roscosmos");
//ab($a);
function ab($a){
    foreach ($a as $b){
        echo $b."<br>";
    }
}
//?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajax загрузка файлов</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/test.js"></script>
</head>
<body>
<form action="upload.php" method="post" target="hiddenframe" enctype="multipart/form-data" onsubmit="hideBtn();">
    <input type="file" id="userfile" name="userfile" />
    <input type="submit" name="upload" id="upload" value="Загрузить" />
</form>
<div id="res"></div>
<iframe id="hiddenframe" name="hiddenframe" style="width:0px; height:0px; border:0px"></iframe>
</form>
</body>
</html>