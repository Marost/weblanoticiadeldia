<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$pub_fecha=date("Y-m-d");
$pub_hora=date("H:i:s");

//CATEGORIA
$rst_cat=mysql_query("SELECT * FROM ".$tabla_suf."_noticia_categoria ORDER BY categoria ASC;", $conexion);

//ETIQUETAS
$rst_tags=mysql_query("SELECT * FROM ".$tabla_suf."_noticia_tags ORDER BY nombre ASC;", $conexion);

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
    init_contadorTa("contenido_corto","contadorContCorto", 280);
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
    
</div><!-- Sidebar ends -->      
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Noticias</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="validate" class="main" method="POST" action="s-guardar.php">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Agregar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Titulo:</label></div>
                        <div class="grid9"><input type="text" name="nombre" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Descripción corta de la noticia:</label></div>
                        <div class="grid9">
                            <textarea id="contenido_corto" name="contenido_corto" maxlength="280con" /></textarea>
                            <p id="contadorContCorto">Caracteres: 0/280</p>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="whead"><h6>Contenido</h6></div>
                        <textarea class="ckeditor" name="contenido" /></textarea>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <div class="widget nomargin">    
                                <div id="uploader">Tu navegador no soporta HTML5.</div>                    
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Video (Youtube):</label> </div>
                        <div class="grid9">http://www.youtube.com/watch?v=
                            <input type="text" name="video_youtube" value="" style="width: 300px;">
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Categoria:</label></div>
                        <div class="grid9">
                            <select name="categoria" class="validate[required] styled">
                                <option>Selecciona</option>
                                <?php while($fila_cat=mysql_fetch_array($rst_cat)){
                                        $notCat_id=$fila_cat["id"];
                                        $notCat_nombre=$fila_cat["categoria"];
                                ?>
                                <option value="<?php echo $notCat_id; ?>"><?php echo $notCat_nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Tipo de noticia: </label></div>
                        <div class="grid9 yes_no">
                            <div class="floatL mr10">Destacada
                                <input type="radio" name="tipo_noticia" value="not_destacada" /></div>
                            <div class="floatL mr10">Superior 1
                                <input type="radio" name="tipo_noticia" value="not_superior1" /></div>
                            <div class="floatL mr10">Superior 2
                                <input type="radio" name="tipo_noticia" value="not_superior2" /></div>
                            <div class="floatL mr10">Superior 3
                                <input type="radio" name="tipo_noticia" value="not_superior3" /></div>
                            <div class="floatL mr10">Superior 4
                                <input type="radio" name="tipo_noticia" value="not_superior4" /></div>
                            <div class="floatL mr10">Superior 5
                                <input type="radio" name="tipo_noticia" value="not_superior5" /></div>
                            <div class="floatL mr10">Superior 6
                                <input type="radio" name="tipo_noticia" value="not_superior6" /></div>
                            <div class="floatL mr10">Superior 7
                                <input type="radio" name="tipo_noticia" value="not_superior7" /></div>
                            <div class="floatL mr10">Superior 8
                                <input type="radio" name="tipo_noticia" value="not_superior8" /></div>
                            <div class="floatL mr10">Superior 9
                                <input type="radio" name="tipo_noticia" value="not_superior9" /></div>
                            <div class="floatL mr10">Normal
                                <input type="radio" name="tipo_noticia" value="not_normal" checked="checked" /></div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Etiquetas:</label></div>
                        <div class="grid9">
                            <select class="selectMultiple" multiple="multiple" tabindex="6" name="tags[]">
                                <option></option>
                                <?php while($fila_tags=mysql_fetch_array($rst_tags)){
                                        $notTag_id=$fila_tags["id"];
                                        $notTag_nombre=$fila_tags["nombre"];
                                ?>
                                <option value="<?php echo $notTag_id; ?>"><?php echo $notTag_nombre; ?></option>
                                <?php } ?>
                            </select>  
                        </div>             
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Redacción:</label></div>
                        <div class="grid9"><input type="text" name="redaccion" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Fecha de publicación:</label></div>
                        <div class="grid4"><input type="text" class="datepicker" name="pub_fecha" value="<?php echo $pub_fecha; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Hora de publicación:</label></div>
                        <div class="grid4"><input type="text" class="timepicker" name="pub_hora" size="10" value="<?php echo $pub_hora; ?>" />
                            <span class="ui-datepicker-append">Utilice la rueda del ratón y el teclado</span></div>
                    </div>
                    
                    <div class="formRow">
                        <div class="body" align="center">
                            <a href="lista.php" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                        </div>
                    </div>
                    
                </div>
            </fieldset>

        </form>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>
