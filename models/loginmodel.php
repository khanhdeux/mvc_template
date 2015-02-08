<?php

class LoginModel extends Model {
    
    public function authUser($username,$password) {
        $sql = "SELECT a.id,a.username FROM users AS a WHERE a.username = ? AND a.password = ?";
        $this->_setSql($sql);
        $user = $this->getRow(array($username,md5($password)));
        if (empty($user)) {
            return false;
        }
        return $user;
    }     
}

