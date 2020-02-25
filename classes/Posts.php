<?php

class Posts{

    private $databaseHandler;
    private $posts;

    public function __construct($dbh){

        $this->databaseHandler= $dbh;
    }

    public function fetchAll(){
      
        $sql="SELECT id, title, description, image, category, username, created_date from posts inner join 
        users on posts.userId=users.id";
        $return_array= $this->databaseHandler->query($sql);
        $this->posts=$return_array->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getPosts(){

        return $this->posts;
    }
}
?>