<?php

namespace App\Controller;

class CategoriesController extends AppController {

    public function category()  {
        
        $category = $this->loadModel('category')->find($_GET['id']);
        $posts = $this->loadModel('post')->findBycategories($_GET['id']);
        $categories = $this->loadModel('category')->all();
        $this->render('categories.index', compact('posts', 'category', 'categories'));
    }
}