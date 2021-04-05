<?php

namespace Agorw\Controller;

use Core\Controller\Controller;
use \App;

class AppController extends Controller
{

    protected $template = 'default';
    protected $viewPath;

    public function __construct()
    {
        $this->viewPath = ROOT.'/App/Views/';
    }

    public function loadModel($nameModel){
        $this->$nameModel = App::getInstance()->getTable($nameModel);
    }
}
