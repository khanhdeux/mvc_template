<?php

class AdminController extends Controller {

    public function __construct($model, $action) {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }

    public function index() {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {

            $posts = $this->_model->getPosts();
            $this->_view->set('title', 'Admin');
            $this->_view->set('posts', $posts);

            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function users() {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {

            $users = $this->_model->getUsers();
            $this->_view->set('title', 'Users');
            $this->_view->set('users', $users);

            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function logout() {
        try {
            session_destroy();
            header('Location: /mvc_template');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function addpost() {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $this->_view->set('title', 'Add Post');
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function submitpost() {
        if (!isset($_POST['newPostSubmit'])) {
            header('Location: /mvc_template/addpost/index');
        }

        $errors = array();
        $check = true;

        $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : NULL;
        $description = isset($_POST['description']) ? trim(htmlspecialchars($_POST['description'])) : NULL;


        if (empty($title)) {
            $check = false;
            array_push($errors, "Title is required!");
        }

        if (empty($description)) {
            $check = false;
            array_push($errors, "Description is required!");
        }

        if (!$check) {
            $this->_setView('addpost');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            return $this->_view->output();
        }

        try {
            $newPost = new AdminModel();
            $newPost->setPostTitle($title);
            $newPost->setPostDescription($description);
            $newPost->addPost();
            header('Location: /mvc_template/admin/index');
        } catch (Exception $e) {
            $this->_setView('addpost');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            $this->_view->set('saveError', $e->getMessage());
        }

        return $this->_view->output();
    }

    public function editpost($id) {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $post = $this->_model->getPostByID($id);
            $this->_view->set('title', 'Edit Post');            
            $this->_view->set('post', self::_htmlSpecialCharsArray($post));
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function submiteditpost($id) {
        
        if (!isset($_POST['editPostSubmit'])) {
            header('Location: /mvc_template/admin/index');
        }
        
        $errors = array();
        $check = true;

        $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : NULL;
        $description = isset($_POST['description']) ? trim(htmlspecialchars($_POST['description'])) : NULL;


        if (empty($title)) {
            $check = false;
            array_push($errors, "Title is required!");
        }

        if (empty($description)) {
            $check = false;
            array_push($errors, "Description is required!");
        }

        if (!$check) {
            $post = $this->_model->getPostByID($id);
            $this->_setView('editpost');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('post', self::_htmlSpecialCharsArray($post));
            return $this->_view->output();
        }

        try {
            $editPost = new AdminModel();
            $editPost->setPostTitle($title);
            $editPost->setPostDescription($description);
            $editPost->updatePostByID($id);
            header('Location: /mvc_template/admin/index');
        } catch (Exception $e) {
            $this->_setView('editpost');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            $this->_view->set('saveError', $e->getMessage());
        }

        return $this->_view->output();
    }    

    public function deletepost($id) {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $this->_view->set('title', 'Edit Post');
            $this->_model->deletePost($id);
            header('Location: /mvc_template/admin/index');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function adduser() {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $this->_view->set('title', 'Add User');
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function submituser() {
        if (!isset($_POST['newUserSubmit'])) {
            header('Location: /mvc_template/adduser/index');
        }

        $errors = array();
        $check = true;

        $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : NULL;
        $password = isset($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : NULL;


        if (empty($username)) {
            $check = false;
            array_push($errors, "Username is required!");
        }

        if (empty($password)) {
            $check = false;
            array_push($errors, "Password is required!");
        }

        if (!$check) {
            $this->_setView('adduser');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            return $this->_view->output();
        }

        try {
            $newPost = new AdminModel();
            $newPost->setUserName($username);
            $newPost->setPassword($password);
            $newPost->addUser();
            header('Location: /mvc_template/admin/users');
        } catch (Exception $e) {
            $this->_setView('adduser');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            $this->_view->set('saveError', $e->getMessage());
        }

        return $this->_view->output();
    }

    public function edituser($id) {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $user = $this->_model->getUserByID($id);
            $this->_view->set('title', 'Edit User');            
            $this->_view->set('user', self::_htmlSpecialCharsArray($user));
            return $this->_view->output();
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function submitedituser($id) {
        
        if (!isset($_POST['editUserSubmit'])) {
            header('Location: /mvc_template/admin/users');
        }
        
        $errors = array();
        $check = true;

        $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : NULL;
        $password = isset($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : NULL;


        if (empty($username)) {
            $check = false;
            array_push($errors, "Username is required!");
        }

        if (empty($password)) {
            $check = false;
            array_push($errors, "Password is required!");
        }

        if (!$check) {
            $user = $this->_model->getUserByID($id);
            $this->_setView('edituser');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('user', self::_htmlSpecialCharsArray($user));
            return $this->_view->output();
        }

        try {
            $editUser = new AdminModel();
            $editUser->setUserName($username);
            $editUser->setPassword($password);
            $editUser->updateUserByID($id);
            header('Location: /mvc_template/admin/users');
        } catch (Exception $e) {
            $this->_setView('edituser');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            $this->_view->set('saveError', $e->getMessage());
        }

        return $this->_view->output();
    }    

    public function deleteuser($id) {

        if (!isset($_SESSION['isAdminLoggedin']) || !$_SESSION['isAdminLoggedin']) {
            header('Location: /mvc_template/login/index');
        }

        try {
            $this->_view->set('title', 'Edit Post');
            $this->_model->deleteUser($id);
            header('Location: /mvc_template/admin/users');
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }    

}
