<?php
function createdb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";
    //creation of connection
    $con=mysqli_connect("$servername","$username","$password");
    // check connection
    if(!$con)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    // create databse
    $createqrey="CREATE DATABASE IF NOT EXISTS $dbname";
    //to execute this command
    if(mysqli_query($con,$createqrey)){
        //echo " Database created Successfully ..";
        $con=mysqli_connect("$servername","$username","$password","$dbname");
        $createtab="
                 CREATE TABLE IF NOT EXISTS books(id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                 book_name VARCHAR (25)NOT NULL,
                 book_publisher VARCHAR (20),
                 book_price FLOAT );
                 ";
        if(mysqli_query($con,$createtab))
        {
           //echo "Table Created";
            return $con;
        }
        else{
            echo "Cannot create the table";
        }
    }
    else{
        echo "Error while creating databse".mysqli_error($con);
    }

}