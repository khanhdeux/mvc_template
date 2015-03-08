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
    
    public function addCommentToPostID($comment,$id) {
        $sql = "INSERT INTO comments 
                    (comment, post_id, user_id,comment_date)
                VALUES 
                    (?, ?, ?, NOW())";

        $data = array(
            $comment,
            $id,
            $_SESSION['userID']
        );

        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }   
    
    public function getCommentsByPostID($id) {
        $sql = "SELECT c.comment,u.username FROM comments AS c INNER JOIN users AS u ON c.user_id = u.id WHERE c.post_id = ? ORDER BY c.comment_date DESC";
        $this->_setSql($sql);
        $posts = $this->getAll(array($id));
        if (empty($posts)) {
            return false;
        }
        return $posts;
    }       
    
}
