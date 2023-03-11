<?php

namespace App\Models;

use App\Config\Config;

class Templates{
    public $TITLE;
    public $DESCRIPTION;
    public $KEYWORDS;
    public $ROUTE;
    public $SYS_NAME;
    public $ADDRESS = "";
    public $URL_ICON = "";
    public $URL_IMG = "";

    var $keyCaptcha_public = ""; /** Google captcha key */

    var $bootstrap = true;
    var $recaptcha = false;
    var $sweetalert = true;
    var $cropper = false;
    var $studylab = false;

    function __construct()
    {
        $CONFIG = new Config();
        $this->ROUTE = $CONFIG->ROOT();
        $this->SYS_NAME = "Mi BarberShop ";
        $this->TITLE = $this->SYS_NAME;
        $this->DESCRIPTION = "Tienda de artículos para barbería y administración de tu propia BarberShop";
        $this->ADDRESS = "San Miguel el Alto";
        $this->KEYWORDS = "Creación de ropa a la medida y en maza ";
        $this->URL_ICON = $this->ROUTE . "galeria/sistema/logos/icon.png";
        $this->URL_IMG = $this->URL_ICON;
        $this->keyCaptcha_public = $CONFIG->keyCaptcha_public;
    }

    function header()
    {
        $headerBody =
            '<!DOCTYPE html>' .
            '<html lang="es">' .

            '<head>' .
            '<meta charset="UTF-8">' .
            '<meta http-equiv="X-UA-Compatible" content="IE=edge">' .
            '<title>' . $this->TITULO . ' </title>' .
            '<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">' .
            '<meta http-equiv="Cache-control" content="no-cache">' .
            '<meta http-equiv="Pragma" content="no-cache">' .
            '<meta http-equiv="Expires" Content="0">' .
            '<meta name="keywords" content="' . $this->KEYWORDS . '">' .
            '<meta name="description" content="' . $this->DESCRIPCION . '">' .
            '<meta name="robots" content="all">' .
            '<meta name="author" content="WEBMASTER - Ing. Leonardo Vázquez Angulo">' .
            '<!-- Open Graph protocol -->' .
            '<meta property="og:title" content="' . $this->DESCRIPCION . '" />' .
            '<meta property="og:site_name" content="' . $this->TITULO . '" />' .
            '<meta property="og:type" content="website" />' .
            '<meta property="og:url" content="' . $this->RUTA . '" />' .
            '<meta property="og:image" content="' . $this->URL_IMG . '" />' .
            '<meta property="og:image:type" content="image/png" />' .
            '<meta property="og:image:width" content="200" />' .
            '<meta property="og:image:height" content="200" />' .
            '<meta property="og:description" content="' . $this->KEYWORDS . '" />' .
            '<meta name="twitter:title" content="' . $this->TITULO . '" />' .
            '<meta name="twitter:image" content="' . $this->URL_IMG . '" />' .
            '<meta name="twitter:url" content="' . $this->RUTA . '" />' .
            '<meta name="twitter:card" content="" />' .
            '<link rel="icon" href="' . $this->URL_ICON . '" type="image/x-icon">';

        /**
         * LIBRERIAS
         */
        if ($this->bootstrap) {
            $headerBody .= '<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> ';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/fontawesome/css/all.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/mdbootstrap/css/bootstrap.min.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/mdbootstrap/css/mdb.min.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/mdbootstrap/css/style.css">';
            $headerBody .= '<script type="text/javascript" src="' . $this->RUTA . 'library/mdbootstrap/js/jquery.min.js"></script>';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'css/estilos.css">';
        }
        if ($this->studylab) {
            $headerBody .= '<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/studylab/css/animate.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/studylab/css/magnific-popup.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/studylab/css/jquery.timepicker.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/studylab/css/style.css">';
        }
        if ($this->recaptcha) {
            $headerBody .= '<script src="https://www.google.com/recaptcha/api.js"></script>';
        }
        if ($this->sweetAlert) {
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/sweetalert/sweetalert2.min.css">';
            $headerBody .= '<script type="text/javascript" src="' . $this->RUTA . 'library/sweetalert/sweetalert2.min.js"></script>';
        }
        if ($this->cropper) {
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/cropper/css/cropper.css">';
            $headerBody .= '<link rel="stylesheet" href="' . $this->RUTA . 'library/cropper/css/main.css">';
        }
        $headerBody .= '</head>';

        echo $headerBody;
    }
}