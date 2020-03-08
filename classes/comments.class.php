<?php

class Comments{

    private $databaseHandler;
    private $comments;

    public function __construct($dbh){

        $this->databaseHandler= $dbh;
        
    }


    public function setComment($postId, $userId, $content){

        $sql="INSERT INTO comment(postId, userId, content) values(?, ?, ?)";
        $stmt=$this->databaseHandler->prepare($sql);
        $return=$stmt->execute([$postId, $userId, $content]);

        if(!$return){
            print_r($this->databaseHandler->errorInfo());
        }else{
            header("location:commentform.php");
        }
    }

    public function fetchAll($postId){
      
        $sql="SELECT u.username, u.image, c.postId, c.userId, c.content, c.created_date from comment as c inner join users as u
        on c.userId=u.id where postId=? order by c.created_date desc";
        $stmt=$this->databaseHandler->prepare($sql);
        $return=$stmt->execute([$postId]);
        if($return){
            $this->comments=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo "Error! No content!";
        }
    }

    public function getComments(){

        return $this->comments;
    }
}
?>