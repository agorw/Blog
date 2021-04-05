<?php

namespace Agorw\Controller;

use Core\HTML\BootstrapForm;
use \App;

class UserController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function login()
    {

        $categories = $this->Category->all();
        $errors = true;
        if (!empty($_POST)) {
            $auth = new \Core\Auth\DBAuth(App::getInstance()->getDB());
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('location: index.php?p=admin.posts.index');
            } else {
                $errors = false;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('Users.login', compact('form', 'errors','categories'));
    }

    public function deconnexion()
    {
        session_destroy();
        header('location: index.php');
    }
}
