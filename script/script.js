$(document).ready(function() {
    var validator = $("#formValidate").validate({
        rules:  {
            nama :{
                required:true,
                minlength: 6,
                maxlength: 100,
            },
            jurusan :{
                required:true,
            },
            universitas :{
                required:true,
            },
            no_telpon :{
                required:true,
            }
        },
        messages :{
            nama : {
                required : "Input nama tidak boleh kosong !",
                minlength : "Input nama Minimal 6 karakter!",
                maxlength : "Input nama Maksimal 100 karakter!"
            },
            jurusan : {
                required : "Input jurusan tidak boleh kosong!"
            },
            universitas : {
                required : "Input universitas tidak boleh kosong!"
            },
            no_telpon : {
                required : "Input nomor telepon tidak boleh kosong!"
            }
        },
        submithandler : function(form) {
            form.submit();
            window.location.href = "index.php";
        }
    });

    $("#hadir").click(function() {
        $("#formValidate").validate();
    });

});