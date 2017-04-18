$("#boton").click(function(e) {
        e.preventDefault();
        $("#principal").toggleClass("cambiado");
            
            if ($("span").hasClass('glyphicon-menu-hamburger')) {

                $(".glyphicon").removeClass('glyphicon-menu-hamburger');
                $("#boton").children("span").addClass("glyphicon-chevron-left");
            }else if ($("span").hasClass('glyphicon-chevron-left')) {

                $(".glyphicon").removeClass('glyphicon-chevron-left');
                $("#boton").children("span").addClass("glyphicon-menu-hamburger");
            }        
    });