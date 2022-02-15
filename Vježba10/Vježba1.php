<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'TUTORIALS';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error());
    }
    echo 'Connected successfully<br>';
    $sql = 'SELECT name FROM tutorials_inf';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);