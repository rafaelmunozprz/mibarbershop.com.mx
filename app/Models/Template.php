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
}