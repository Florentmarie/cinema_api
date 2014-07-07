<?php

require("src/toro.php");

class ListUsers {
    function get() {
      echo "Hello, world";
    }
}

Toro::serve(array(
    "/users" => "ListUsers"
));