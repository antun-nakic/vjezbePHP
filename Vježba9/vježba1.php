<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'guest';
    $dbpass = 'guest123';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
    }
    
    echo 'Connected successfully';
    mysqli_close($conn);