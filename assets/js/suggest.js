$(document).ready(function(){
    $("#pat_sug").keyup(function () { 
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/pharma/assets/php/suggest.php",
            data: 'keyword=' + $(this).val(),
            beforeSend: function(){
                $("#pat_sug").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#sug-box").show();
                $("#sug-box").html(data);
                $("#pat_sug").css("background","#FFF");
            }
        });
    });
});
function selectPatient(val) {
    $("#pat_sug").val(val);
    $("#sug-box").hide();
}

//sells.date BETWEEN '$start' AND '$end'