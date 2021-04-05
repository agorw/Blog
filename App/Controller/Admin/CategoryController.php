<?php

namespace Agorw\Controller\Admin;

use Core\HTML\BootstrapForm;

class CategoryController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index()
    {
        $Category = $this->Category->all();
        $this->render('Admin.Category.index', compact('Category'));
    }

    public function add()
    {
        $form = new BootstrapForm($_POST);
        $categorieTable = $this->Category;

        if (!empty($_POST)) {
            $result = $categorieTable->create(array(
                'name_cat' => $_POST['name_cat'],
            ));
            if ($result) {
                $this->index();
            }
        }
        $form = new BootstrapForm();
        $this->render('Admin.Category.add', compact('form'));
    }

    public function edit()
    {
        $categorieTable = $this->Category;
        $reponse = false;
        if (!empty($_POST)) {
            $result = $categorieTable->update($_GET['id'], array(
                'name_cat' => $_POST['name_cat'],
            ));
            if ($result) {
                $reponse = true;
            }
        }
        $categorie = $categorieTable->find($_GET['id']);

        $form = new BootstrapForm($categorie);
        $this->render('Admin.Category.edit', compact('form', 'reponse', 'categorie'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }
}
