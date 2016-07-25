<?php
require "includes/filechange.php";
require "includes/db.php";
if(isset($_POST['upload'])){
    //Список разрешенных файлов
    $whitelist = array(".fb2", ".jpeg", ".pdf");
    $data = array();
    $error = true;

    //Проверяем разрешение файла
    foreach  ($whitelist as  $item) {
        if(preg_match("/$item\$/i",$_FILES['userfile']['name'])) $error = false;
    }

    //если нет ошибок, грузим файл
    if(!$error) {

        $folder =  'users_files/';//директория в которую будет загружен файлy
        $uploadedFile =  rus2translit($folder.basename($_FILES['userfile']['name']));
        
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])){

            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadedFile)){

                $data = $_FILES['userfile'];
                echo "<script>window.parent.endDownload();</script>";
            }
            else {
                $data['errors'] = "Во время загрузки файла произошла ошибка";
            }
        }
        else {
            $data['errors'] = "Файл не  загружен";
        }
    }
    else{

        $data['errors'] = 'Вы загружаете запрещенный тип файла';
    }

    //Формируем js-файл    
    $res = '<script type="text/javascript">';
    $res .= "var data = new Object;";
    foreach($data as $key => $value){
        $res .= 'data.'.$key.' = "'.$value.'";';
    }
    $res .= 'window.parent.handleResponse(data);';
    $res .= "</script>";

    echo $res;

}
else{
    die("ERROR");
}
?>