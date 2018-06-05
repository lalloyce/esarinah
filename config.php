<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'gkuaCleOH7i6');
define('DB_DATABASE', 'egolit');

// Create connection
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

   // check connection 
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    // return name of current default database 
    if ($result = $mysqli->query("SELECT DATABASE()")) {
        $row = $result->fetch_row();
        printf("Default database is %s.\n", $row[0]);
        $result->close();
    }

    //Create database EGOLIT if it does not exist
    $sql = "CREATE DATABASE IF NOT EXISTS egolit";
        if($mysqli->query($sql) === TRUE){
            echo "Database created successfully!";
        }else {
            echo "Error creating database: " .$mysqli->error;
        }

    // change db to EGOLIT
    $mysqli->select_db(DB_DATABASE);

        // return name of current default database 
        if ($result = $mysqli->query("SELECT DATABASE()")) {
            $row = $result->fetch_row();
            printf("Default database is %s.\n", $row[0]);
            $result->close();
        }

        // sql to create table USERS
        $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER(6) PRIMARY KEY UNSIGNED AUTO_INCREMENT,
        email VARCHAR(70) UNIQUE,
        pass VARCHAR(50),
        registrationDate TIMESTAMP,
        activationStatus BIT(1) 
        )";

            if ($mysqli->query($sql) === TRUE) {
                echo "Table Users created successfully";
            } else {
                echo "Error creating table: " . $mysqli->error;
            }



    

?>