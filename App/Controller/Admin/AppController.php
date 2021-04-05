<?php

namespace Agorw\Controller\Admin;

use \App;
use Core\Auth\DBAuth;

class AppController extends \Agorw\Controller\AppController
{

    public function __construct()
    {
        parent::__construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();
        }
    }
}
