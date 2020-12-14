<?php
$username=$_POST['username'];
$password=$_POST['password'];
$con=mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'You are not connect with the server';

}
if(!mysqli_select_db($con,'Akash'))
{
    echo 'Database not selected';
}

$sql="INSERT INTO login(username,password) VALUES ('$username','$password')";

if(!mysqli_query($con,$sql))
{
    echo "data not inserted";
}
else
{
    echo "Data Inserted";
}
header("refresh:10;url=sectioni.html");

?>
