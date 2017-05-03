<?php require_once "sections/head.php"; ?>
<body>
<?php 
include("sections/cargando.php");  
include("sections/banner.php");  
include("sections/login.php");  
include("sections/footer.php");
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html>

<!--********************  validar correo  ****************-->


                  <div class="modal fade" id="validar">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Reestablecer contraseña</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <div class="imagen">
                <img src="src/img/passw.png" alt="...">
            </div>
            <h4 align="center" class="titulo"> Fase 1: Autenticacion</h4>
             
            <form class="form-group col-sm-12" method="post">
                <div class="input-group col-sm-12">
                 <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" id="email" class="form-control" autofocus placeholder="Escriba su correo..." maxlength="25">
              <div class="input-group-btn">
                <button type="button" class="btn btn-info boton" onclick="validar()">
                        <span class="glyphicon glyphicon-ok"></span>   
                        Enviar
                      </button>
                </div>
            </div>
            </form>
                        </div>

                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        <div class="col-sm-12" id="result"></div> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL validar correo-->

<!--******************************************************************-->