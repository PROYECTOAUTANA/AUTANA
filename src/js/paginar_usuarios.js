  $(document).ready(function(){
    load(1);
  });

  function load(page){
    var parametros = {"accion":"ajax","page":page};
    $.ajax({
      url:'?controller=paginador&action=paginar_usuarios',
      data: parametros,
      success:function(data){
        $(".usuarios_paginados").html(data).fadeIn('slow');
      }
    })
  }