<?PHP

define("ROOT_PATH", realpath(dirname(__FILE__)));
echo ROOT_PATH;
var_dump(ROOT_PATH);

// define(BASE_URL, "http://localhost:1234MILink");

// include(ROOT_PATH . "/views/loginform.php");

?>

include("includes/db.php");

               $userId=$_SESSION['user__id'];
               $sql="SELECT image from users where id=?";
               $stmt=$dbh->prepare($sql);
               $return=$stmt->execute([$userId]);
               if(!$return){
                print_r($dbh->errorInfo());
                die;
               }
               $data=$stmt->fetch(PDO::FETCH_ASSOC);
               $image=$data['image'];
               print_r($image);


               <img class=\"user-image\" src=\"images/".$image."\" alt=\"picture\"> 