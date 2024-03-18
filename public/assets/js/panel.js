function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

$("#cerrarsesion").click( function(){
    $.ajax({
        url: '/logout',
        data: {},
        type: 'GET',
        success:  function (json) {
            location.href ='/login';
        },
        error:function(x,xs,xt){
            $.notify(JSON.stringify(x), "error");
        }
    });
});