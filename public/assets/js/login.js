$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#btnlogin").click( function(){

    var usuario = $("#txtusuario").val();
    var clave = $("#txtpassword").val();

    if(usuario && clave){

        $.ajax({
            url: '/weblogin',
            data: {
                'usuario': usuario,
                'password': clave,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: "json",
            success:  function (json) {
                if(json.status){
                    $.notify(json.msg, "success");
                    location.href ='/' + json.redirect;
                } else {
                    $.notify(json.msg, "error");
                }
            },
            error:function(x,xs,xt){
                $.notify(JSON.stringify(x), "error");
            }
        });
    } else {
        $.notify("Complete todos los campos, por favor.", "error");
    }                
});

function validateNumber(e) {
    const pattern = /^[0-9]$/;

    return pattern.test(e.key )
}