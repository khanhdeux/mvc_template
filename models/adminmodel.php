<?php

class AdminModel extends Model {

    private $_title;
    private $_description;
    private $_userName;
    private $_password;

    public function setPostTitle($title) {
        $this->_title = $title;
    }

    public function setPostDescription($description) {
        $this->_description = $description;
    }

    public function setUserName($userName) {
        $this->_userName = $userName;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function getPosts() {
        $sql = "SELECT a.id,a.title,a.description FROM posts AS a";
        $this->_setSql($sql);
        $posts = $this->getAll();
        if (empty($posts)) {
            return false;
        }
        return $posts;
    }

    public function addPost() {
        $sql = "INSERT INTO posts 
                    (title, description)
                VALUES 
                    (?, ?)";

        $data = array(
            $this->_title,
            $this->_description,
        );

        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

    public function updatePostByID($id) {
        if ($id) {
            $sql = "UPDATE posts AS a SET a.title = ?, a.description = ? WHERE a.id= ?";
            
            $data = array(
                $this->_title,
                $this->_description,
                $id
            );
            $sth = $this->_db->prepare($sql);
            return $sth->execute($data);
        }
    }
    
    public function getPostByID($id) {
        $sql = "SELECT a.id,a.title,a.description FROM posts AS a WHERE a.id= ?";
        $this->_setSql($sql);
        $post = $this->getRow(array($id));
        if (empty($post)) {
            return false;
        }
        return $post;
    }       

    public function deletePost($id) {
        if ($id) {
            $sql = "DELETE FROM posts WHERE id = ?";
            $sth = $this->_db->prepare($sql);
            return $sth->execute(array($id));
        }
    }

    public function getUsers() {
        $sql = "SELECT a.id,a.username FROM users AS a";
        $this->_setSql($sql);
        $users = $this->getAll();
        if (empty($users)) {
            return false;
        }
        return $users;
    }

}
