<?php
define( 'DB_SERVER' , '45.55.51.56:80' );
define( 'DB_USERNAME' , 'root' );
define( 'DB_PASSWORD' , 'asdf6245' );
define( 'DB_DATABASE' , 'responses' );

class DB_Class {
    function __construct() {
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
    }
}
?>