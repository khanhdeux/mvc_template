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
            $post = $this->_model->getPostByID((int) $id);
            $comments = $this->_model->getCommentsByPostID((int) $id);
            $this->_view->set('title', 'Detail');
            $this->_view->set('post', $post);
            $this->_view->set('comments', $comments);

            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function comment($id) {
        if (!isset($_SESSION['isUserLoggedin']) || !$_SESSION['isUserLoggedin']) {
            header('Location: /mvc_template/login/index');
        }
        if (!isset($_POST['commentSubmit'])) {
            header('Location: /mvc_template/blog/detail/' . $id);
        }

        $comment = isset($_POST['comment']) ? trim(htmlspecialchars($_POST['comment'])) : NULL;
        try {
            if ($comment) $this->_model->addCommentToPostID($comment, (int) $id);
            header('Location: /mvc_template/blog/detail/' . $id);
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function logout($id) {
        try {
            session_destroy();
            header('Location: /mvc_template');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }    
}
