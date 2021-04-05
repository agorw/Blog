<?php

namespace Agorw\Controller\Admin;

use Core\HTML\BootstrapForm;

class PostsController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index()
    {
        $posts = $this->Post->all();
        $this->render('Admin.Posts.index', compact('posts'));
    }

    public function add()
    {
        $reponse = true;
        $postTable = $this->Post;
        if (!empty($_POST)) {
            $result = $postTable->create(array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'categories_id' => $_POST['categories_id']
            ));
            if ($result) {
                $reponse = false;
            }
        }
        $categories = $this->Category->lists('categories_id', 'name_cat');
        $form = new BootstrapForm($_POST);
        $this->render('Admin.Posts.edit', compact('form', 'reponse', 'categories'));
    }

    public function edit()
    {
        $reponse = true;
        $postTable = $this->Post;
        if (!empty($_POST)) {
            $result = $postTable->update($_GET['id'], array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'categories_id' => $_POST['categories_id']
            ));
            if ($result) {
                $reponse = false;
            }
        }
        $post = $postTable->find($_GET['id']);
        $categories = $this->Category->lists('categories_id', 'name_cat');
        $form = new BootstrapForm($post);
        $this->render('Admin.Posts.edit', compact('form', 'reponse', 'categories', 'post'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }
}
