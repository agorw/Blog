<?php

namespace Agorw\Controller;

use \App;

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
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('Posts.index', compact('posts', 'categories'));
    }

    public function category()
    {
        $app = App::getInstance();
        $categorie = $this->Category->find($_GET['id']);
        if ($categorie === false) {
            $this->notfound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories =  $this->Category->all();
        $this->render('Posts.category', compact('posts', 'categories', 'categorie'));
    }

    public function show()
    {
        $app = App::getInstance();
        $post = $app->getTable('Post')->find($_GET['id']);
        if ($post === false) {
            $this->notfound();
        }
        $categories =  $app->getTable('Category')->all();
        $this->render('Posts.show', compact('post', 'categories'));
    }
}
