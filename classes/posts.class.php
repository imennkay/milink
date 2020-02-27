<?php

class Posts{

    private $databaseHandler;
    private $posts;
    private $singlePost;

    public function __construct($dbh){

        $this->databaseHandler= $dbh;
    }

    public function fetchAll(){
      
        $sql="SELECT p.id, title, description, p.image, category, username, p.created_date from posts as p inner join users as u on p.userId=u.id";
        $return_array= $this->databaseHandler->query($sql);
        if($return_array){
            $this->posts=$return_array->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo "Error! No content!";
        }
    }

    public function fetchSinglePost($id){
        $sql="SELECT title, description, p.image, category, username, p.created_date from posts as 
        p inner join users as u on p.userId=u.id where p.id=:id";
        $stmt=$this->databaseHandler->prepare($sql);
        $stmt->bindparam(':id', $id);
        $return=$stmt->execute();
        if(!$return){
            print_r($this->databaseHandler->errorInfo());
        die;
        }else{
            $this->singlePost=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getPosts(){

        return $this->posts;
    }

    public function getSinglePost(){
        return $this->singlePost;
    }
}
?>