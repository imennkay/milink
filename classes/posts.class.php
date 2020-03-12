<?php

class Posts{

    private $databaseHandler;
    private $posts;
    private $singlePost;
    private $searchResult;
    public  $numSearchResult;

    public function __construct($dbh){

        $this->databaseHandler= $dbh;
    }

    public function fetchAll(){
      
        $sql="SELECT * from posts ORDER BY id asc";
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

    public function fetchSearchResult($searchQuery){
        $sql= "SELECT id, title, image, description, created_date from posts where title like :searchQuery or description like :searchQuery";
    
        $stmt = $this->databaseHandler->prepare($sql);
        $queryParam='%'.$searchQuery.'%';
        $stmt->bindParam(':searchQuery', $queryParam);
        $return = $stmt->execute();
        if(!$return){
            print_r($dbh->errorInfo());
            die;
        }
        $this->searchResult=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->numSearchResult=$stmt->rowCount();
    }
    
    public function getPosts(){

        return $this->posts;
    }

    public function getSinglePost(){
        return $this->singlePost;
    }

    public function getSearchResult(){
        return $this->searchResult;
    }
}
?>