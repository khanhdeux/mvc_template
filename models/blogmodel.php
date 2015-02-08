<?php

class BlogModel extends Model {

    public function getPosts() {
        $sql = "SELECT a.id,a.title,a.description FROM posts AS a";
        $this->_setSql($sql);
        $posts = $this->getAll();
        if (empty($posts)) {
            return false;
        }
        return $posts;
    }
    
    public function getPostByID($id) {
        $sql = "SELECT a.id,a.title,a.description FROM posts AS a WHERE a.id = ?";
        $this->_setSql($sql);
        $post = $this->getRow(array($id));
        if (empty($post)) {
            return false;
        }
        return $post;
    }    

}
