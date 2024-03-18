$("#btnllamame").click( function(){

    var celular = $("#num_celular").val();
    var dni = $("#dni").val();

    if($("#chckmarcar").prop('checked') == false){
        $.notify("Debe de acepta las politicas de privacidad", "error");
    } else if(celular && dni){
        var data = {
            'num_celular': celular,
            'dni': dni,
        };
        $.ajax({
            url: '/api/nuevaSolicitacion',
            data: JSON.stringify(data),
            type: 'POST',
            success:  function (json) {
                if(json.status){
                    $.notify(json.msg, "success");
                    setInterval("location.reload()",2000);
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