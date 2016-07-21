function hideBtn(){
    //$('#upload').hide();
    $('#progress').css("");
    $('#res').html("Идет загрузка файла");
    $('#progress_load').css('width','30%');
}

function handleResponse(mes) {
    $('#upload').show();
    if (mes.errors != null) {
        $('#res').html("Возникли ошибки во время загрузки файла: " + mes.errors);
    }
    else {
        $('#res').html("Файл " + mes.name + " загружен");
    }
}
function endDownload() {
    alert("Готово");
}