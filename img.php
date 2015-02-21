<?php
require_once('panel@lndd/conexion/conexion.php');
require_once('panel@lndd/js/plugins/thumbs/ThumbLib.inc.php');

$carpeta = $_REQUEST["carpeta"];
$imagen = $_REQUEST["img"];
$width = $_REQUEST["width"];
$height = $_REQUEST["height"];

$url = "imagenes/upload/".$carpeta."/".$imagen;

$thumb = PhpThumbFactory::create($url);
$thumb->adaptiveResize($width, $height);
$thumb->show();