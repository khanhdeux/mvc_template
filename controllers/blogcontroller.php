<?php

class BlogController extends Controller {

    public function __construct($model, $action) {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }

    public function index() {
        try {
            $posts = $this->_model->getPosts();            
            $this->_view->set('title', 'Posts');
            $this->_view->set('posts', $posts);
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function detail($id) {
        try {
            $post = $this->_model->getPostByID((int)$id);
            $this->_view->set('title', 'Detail');
            $this->_view->set('post',$post);
            
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }    

}
