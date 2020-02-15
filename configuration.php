<?php  
    $conn = new mysqli('localhost','root','','abcdb');

    if($conn->connect_error )
    {
        echo "<h1>Could not connect to the server...</h1>";
    }

?>