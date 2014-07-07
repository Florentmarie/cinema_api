<?php

require("src/toro.php");
require_once( 'connection.php' );

class ListUsers {
    function get() {
	include ('connection.php');
      $sql = 'SELECT * FROM `users` ORDER BY `users`.`name` ASC';
			foreach  ($db->query($sql) as $row) {
		        print $row['name'] . "\t";
		        echo "</br>";
		  	}
    }
}

Toro::serve(array(
    "/users" => "ListUsers"
));