<?php

require("src/toro.php");
require_once( 'connection.php' );


Toro::serve(array(
    "/users" => "Users",
    "/users/:number" => "UsersWithId",
    //"/users/:number/:string" => "UsersWithId",
    "/movies" => "Movies",
    "/movies/:number" => "MoviesWithId",
    "/movies/:number/:string" => "MoviesWithId",
    "/genres" => "Genres",
    "/users/:number/likes" => "UsersLikes",
    "/users/:number/likes/:number" => "UsersLikes",
    "/users/:number/dislikes" => "UsersDislikes",
    "/users/:number/dislikes/:number" => "UsersDislikes"

));

class Users {
    function get() {
	global $db;

    $query = $db->prepare("SELECT * FROM `users` ORDER BY `users`.`id` ASC");
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }
    function post() {
		global $db;
		$name = $_POST['name'];
		
      	$sql = 'INSERT INTO `users` (`id`, `name`) VALUES (NULL, "'.$name.'")';
		$db->query($sql);

    $query = $db->prepare("SELECT * FROM `users` ORDER BY `users`.`id` ASC");
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);

	}
}
class UsersWithId {

    function get($id) {
		global $db;

    $query = $db->prepare('SELECT * FROM `users` WHERE `id` = '.$id.' ORDER BY `id` ASC');
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }

    /*function put($id, $name) {
		global $db;
      	$sql = "UPDATE `users` SET `name` = '".$name."' WHERE `users`.`id` = ".$id.";";
      	echo "Le users est bien modifié";
		$db->query($sql);
    }*/

    function delete($id) {
		global $db;
      	$sql = "DELETE FROM `users` WHERE `users`.`id` = ".$id."";
		$db->query($sql);

    $query = $db->prepare("SELECT * FROM `users` ORDER BY `users`.`id` ASC");
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);

    }
}

class UsersLikes {
  function get($id) {
    global $db;
   // $query = $db->prepare("SELECT `movies`.`title` FROM `movies`, `liaison` WHERE `user_id` =".$id." AND `movies_id` = `movies`.`id` ORDER BY `movies`.`id` ASC");
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 1) ");
    //echo ("SELECT * FROM `liaison` WHERE `user_id` = ".$id." ORDER BY `user_id` ASC");
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }

    function post($id, $movie_id) {
    global $db;
    $sql = 'INSERT INTO `liaison` (`user_id`, `movies_id`, `liked`, `watched`) VALUES ('.$id.', '.$movie_id.', 1, 1)';
    $db->query($sql);
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 1) ");
    
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }
    function delete($id, $movie_id) {
    global $db;
    $sql = "DELETE FROM `liaison` WHERE `liaison`.`user_id` = ".$id." AND `liaison`.`movies_id` = ".$movie_id." ";
    $db->query($sql);
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 1) ");
    
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }
}

class UsersDislikes {
  function get($id) {
    global $db;
   // $query = $db->prepare("SELECT `movies`.`title` FROM `movies`, `liaison` WHERE `user_id` =".$id." AND `movies_id` = `movies`.`id` ORDER BY `movies`.`id` ASC");
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 0) ");
    //echo ("SELECT * FROM `liaison` WHERE `user_id` = ".$id." ORDER BY `user_id` ASC");
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }

    function post($id, $movie_id) {
    global $db;
    $sql = 'INSERT INTO `liaison` (`user_id`, `movies_id`, `liked`, `watched`) VALUES ('.$id.', '.$movie_id.', 0, 1)';
    $db->query($sql);
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 0) ");
    
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }
    function delete($id, $movie_id) {
    global $db;
    $sql = "DELETE FROM `liaison` WHERE `liaison`.`user_id` = ".$id." AND `liaison`.`movies_id` = ".$movie_id." ";
    $db->query($sql);
    $query = $db->prepare("SELECT * FROM `movies` WHERE `id` IN (SELECT `movies_id` FROM `liaison` WHERE user_id = ".$id." AND `liked` = 0) ");
    
    $query->execute();
    $test = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($test);
    }
}





class Movies {
    function get() {
      global $db;
      $query = $db->prepare("SELECT * FROM `movies` ORDER BY `movies`.`id` ASC");
      $query->execute();
      $test = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($test);
    }
    function post() {
    global $db;
    $title = $_POST['title'];
    $cover = $_POST['cover'];
    $genre = $_POST['genre']; 
    
        $sql = 'INSERT INTO `movies` (`id`, `title`, `cover`, `genre`) VALUES (NULL, "'.$title.'", "'.$cover.'", "'.$genre.'")';
    $db->query($sql);

    $query = $db->prepare("SELECT * FROM `movies` ORDER BY `movies`.`id` ASC");
      $query->execute();
      $test = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($test);  
  }
}
class MoviesWithId {
    function get($id) {
    global $db;
      $query = $db->prepare('SELECT * FROM `movies` WHERE `id` = '.$id.' ORDER BY `id` ASC');
      $query->execute();
      $test = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($test);  
    }
    /*function put($id, $name) {
    global $db;
        $sql = "UPDATE `users` SET `name` = '".$name."' WHERE `users`.`id` = ".$id.";";
        echo "Le users est bien modifié";
    $db->query($sql);
    }*/
    function delete($id) {
    global $db;
        $sql = "DELETE FROM `movies` WHERE `movies`.`id` = ".$id."";
    $db->query($sql);

    $query = $db->prepare("SELECT * FROM `movies` ORDER BY `movies`.`id` ASC");
      $query->execute();
      $test = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($test);
    }
}




class Genres {
    function get() {
      global $db;
      $query = $db->prepare("SELECT * FROM `genres` ORDER BY `genres`.`id` ASC");
      $query->execute();
      $test = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($test);
    }
}