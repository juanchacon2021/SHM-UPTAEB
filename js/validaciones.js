$(document).ready(function(){
    if($.trim($("#mensajes").text()) != ""){
        muestraMensaje($("#mensajes").html());
    }

})