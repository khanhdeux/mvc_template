<?php

class LoginController extends Controller {

    public function __construct($model, $action) {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index() {
        $this->_view->set('title', 'Admin Login');
        return $this->_view->output();
    }

    public function submit() {
        if (!isset($_POST['loginFormSubmit'])) {
            header('Location: /login/index');
        }

        $errors = array();
        $check = true;
        $isAdmin = false;
        
        $userName = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : NULL;
        $password = isset($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : NULL;
        if ($userName == ADMIN && $password = ADMIN_PASS) {
            $isAdmin = true;
        }         

        if (empty($userName)) {
            $check = false;
            array_push($errors, "Username is required!");
        }

        if (empty($password)) {
            $check = false;
            array_push($errors, "Password is required!");
        }
        
        if ($userName && $password && !$isAdmin && !$this->_model->authUser($userName, $password)){
            $check = false;
            array_push($errors, "Username and Password dont match!");            
        }               

        if (!$check) {
            $this->_setView('index');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            return $this->_view->output();
        }

        try {

            if ($userName == ADMIN && $password = ADMIN_PASS) {
                $_SESSION['isAdminLoggedin'] = true;
                header('Location: /mvc_template/admin/index');
            } else {
                $user = $this->_model->authUser($userName, $password);                
                $_SESSION['isUserLoggedin'] = true;
                $_SESSION['userID'] = $user['id'];
                header('Location: /mvc_template/');
            }
        } catch (Exception $e) {
            $this->_setView('index');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', self::_htmlSpecialCharsArray($_POST));
            $this->_view->set('saveError', $e->getMessage());
        }

        return $this->_view->output();
    }

}
