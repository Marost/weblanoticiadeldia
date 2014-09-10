<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES DE URL
$mensaje=$_REQUEST["msj"];

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_rciud_usuario_datos WHERE usuario='$usuario_user';", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//DATOS PERSONALES
$nota_nombre=$fila_nota["nombre"];
$nota_apellidos=$fila_nota["apellidos"];
$nota_descripcion=$fila_nota["descripcion"];
$nota_telefono=$fila_nota["telefono"];
$nota_documento_tipo=$fila_nota["documento_tipo"];
$nota_documento_numero=$fila_nota["documento_numero"];
$nota_direccion=$fila_nota["direccion"];

//FOTO
$nota_imagen=$fila_nota["foto"];
$nota_imagen_carpeta=$fila_nota["foto_carpeta"];

//SOCIAL MEDIA
$nota_social_facebook=$fila_nota["social_facebook"];
$nota_social_twitter=$fila_nota["social_twitter"];
$nota_social_google=$fila_nota["social_google"];
$nota_social_youtube=$fila_nota["social_youtube"];
$nota_social_instagram=$fila_nota["social_instagram"];
$nota_social_tumblr=$fila_nota["social_tumblr"];
$nota_social_pinterest=$fila_nota["social_pinterest"];
$nota_social_linkedin=$fila_nota["social_linkedin"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

<!-- CONTADOR DE CARACTERES -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
var jTxCount=jQuery.noConflict();

jTxCount(document).on("ready", function(){
    init_contadorTa("descripcion","contadorContCorto", 300);
});

function init_contadorTa(idtextarea, idcontador,max)
{
    jTxCount("#"+idtextarea).keyup(function()
            {
                updateContadorTa(idtextarea, idcontador,max);
            });
    
    jTxCount("#"+idtextarea).change(function()
    {
            updateContadorTa(idtextarea, idcontador,max);
    });
    
}

function updateContadorTa(idtextarea, idcontador,max)
{
    var contador = jTxCount("#"+idcontador);
    var ta =     jTxCount("#"+idtextarea);
    contador.html("0/"+max);
    
    contador.html(ta.val().length+"/"+max);
    if(parseInt(ta.val().length)>max)
    {
        ta.val(ta.val().substring(0,max-1));
        contador.html(max+"/"+max);
    }

}
</script>
<style>
#contadorContCorto{ font-size:15px; font-weight:bold; color:#000; }
</style>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->


<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
</div>
<!-- Sidebar ends -->    
    
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>MI PERFIL</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <?php if($mensaje=="okd"){ //MENSAJE OK - DATOS PERSONALES ?>
        <div class="nNote nSuccess">
            <p>Tus datos personales, se han actualizado correctamente</p>
        </div>
        <?php }elseif($mensaje=="erd"){ //MENSAJE ERROR - DATOS PERSONALES ?>
        <div class="nNote nFailure">
            <p>Se produjo un error, al actualizar tus datos personales</p>
        </div>
        <?php }elseif($mensaje=="oks"){ //MENSAJE OK - REDES SOCIALES ?>
        <div class="nNote nSuccess">
            <p>Tus datos de redes sociales, se han actualizado correctamente</p>
        </div>
        <?php }elseif($mensaje=="ers"){ //MENSAJE ERROR - REDES SOCIALES ?>
        <div class="nNote nFailure">
            <p>Se produjo un error, al actualizar tus datos de redes sociales</p>
        </div>
        <?php }elseif($mensaje=="okf"){ //MENSAJE OK - FOTO ?>
        <div class="nNote nSuccess">
            <p>Tus foto, se ha actualizado correctamente</p>
        </div>
        <?php }elseif($mensaje=="erf"){ //MENSAJE ERROR - FOTO ?>
        <div class="nNote nFailure">
            <p>Se produjo un error, al actualizar tu foto</p>
        </div>
        <?php }elseif($mensaje=="okc"){ //MENSAJE OK - CAMBIAR CONTRASEÑA ?>
        <div class="nNote nSuccess">
            <p>Tu contraseña, se ha actualizado correctamente</p>
        </div>
        <?php }elseif($mensaje=="erc"){ //MENSAJE ERROR - CAMBIAR CONTRASEÑA ?>
        <div class="nNote nFailure">
            <p>Se produjo un error, al cambiar tu contraseña</p>
        </div>
        <?php } ?>

        <div class="widget fluid">

            <div class="tabs">
                <ul>
                    <li><a href="#tabs-1">Datos Personales</a></li>
                    <li><a href="#tabs-2">Redes Sociales</a></li>
                    <li><a href="#tabs-3">Foto</a></li>
                    <li><a href="#tabs-4">Cambiar contraseña</a></li>
                </ul>
                <div id="tabs-1">

                    <form class="main" method="POST" action="s-datos.php">

                        <div class="formRow">
                            <div class="grid3"><label>Usuario:</label></div>
                            <div class="grid9"><?php echo $usuario_user; ?></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Nombre:</label></div>
                            <div class="grid9"><input type="text" name="nombre" value="<?php echo $nota_nombre; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Apellido(s):</label></div>
                            <div class="grid9"><input type="text" name="apellidos" value="<?php echo $nota_apellidos; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Tipo de Documento:</label></div>
                            <div class="grid9"><?php echo $nota_documento_tipo; ?></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Número de Documento:</label></div>
                            <div class="grid9"><?php echo $nota_documento_numero; ?></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Direccion:</label></div>
                            <div class="grid9"><input type="text" name="direccion" value="<?php echo $nota_direccion; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Telefono:</label></div>
                            <div class="grid9"><input type="text" name="telefono" value="<?php echo $nota_telefono; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Descríbete:</label></div>
                            <div class="grid9">
                                <textarea id="descripcion" name="descripcion" maxlength="300" /><?php echo $nota_descripcion; ?></textarea>
                                <p id="contadorContCorto">Caracteres: 0/300</p>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="body" align="center">
                                <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                            </div>
                        </div>

                    </form>

                </div>

                <div id="tabs-2">

                    <form class="main" method="POST" action="s-social.php">

                        <div class="formRow">
                            <div class="grid3"><label>Facebook:</label></div>
                            <div class="grid9"><input type="text" name="social_facebook" value="<?php echo $nota_social_facebook; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Twitter:</label></div>
                            <div class="grid9"><input type="text" name="social_twitter" value="<?php echo $nota_social_twitter; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Google+:</label></div>
                            <div class="grid9"><input type="text" name="social_google" value="<?php echo $nota_social_google; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Youtube:</label></div>
                            <div class="grid9"><input type="text" name="social_youtube" value="<?php echo $nota_social_youtube; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Pinterest:</label></div>
                            <div class="grid9"><input type="text" name="social_pinterest" value="<?php echo $nota_social_pinterest; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="grid3"><label>Linkedin:</label></div>
                            <div class="grid9"><input type="text" name="social_linkedin" value="<?php echo $nota_social_linkedin; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="body" align="center">
                                <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                            </div>
                        </div>

                    </form>

                </div>

                <div id="tabs-3">

                    <form class="main" method="POST" action="s-foto.php" enctype="multipart/form-data">

                        <div class="formRow">
                            <div class="grid12">
                                <div class="margin15">
                                    <a href="/imagenes/rciud/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>" class="lightbox">
                                        <img src="/imagenes/rciud/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>" width="100" >
                                    </a>
                                </div>
                                <div class="margin15">    
                                    <input type="file" class="styled" id="fileInput" name="fileInput" />
                                    <input type="hidden" name="imagen" value="<?php echo $nota_imagen; ?>">
                                    <input type="hidden" name="imagen_carpeta" value="<?php echo $nota_imagen_carpeta; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="body" align="center">
                                <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                            </div>
                        </div>

                    </form>

                </div>

                <div id="tabs-4">

                    <form class="main" method="POST" action="s-clave.php">

                        <div class="formRow">
                            <div class="grid3"><label>Contraseña:</label></div>
                            <div class="grid9"><input type="password" name="clave" value="<?php echo $nota_clave; ?>" /></div>
                        </div>

                        <div class="formRow">
                            <div class="body" align="center">
                                <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                            </div>
                        </div>

                    </form>

                </div>

            </div>                  
                                
        </div>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>