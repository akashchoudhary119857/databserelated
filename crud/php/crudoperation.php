<?php
require_once ("databasedb.php");
require_once ("component.php");
$con=createdb();//it will return a connection string so will store it in variable.
//create button code
if(isset($_POST['create']))
{
    //echo " create button click";
    createdata();
}
/*if (isset($_POST['read']))
{
    getData();// specify this in php.index
}*/
if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteData();
}
if(isset($_POST['deleteall'])){
    deletealldata();

}
function createdata()
{
 //   $bookname=$_POST['book_name'];
    $bookname=textboxvalue("book_name");
    $bookpublisher=textboxvalue("book_publisher");
    $bookprice=textboxvalue("book_price");
    // check the value inside variables
    if($bookname && $bookpublisher && $bookprice)
    {
    $insertquery="INSERT INTO books(book_name,book_publisher,book_price) VALUES ('$bookname','$bookpublisher','$bookprice')";
    if(mysqli_query($GLOBALS['con'],$insertquery))
    {
       // echo "Record successfully inserted..!";
        TextNode("success","Record successfully inserted..!");//are the class name in style sheet
    }
    else{
        echo "Error";
    }
    }
    else{
         // echo "Provide data in the textbox";
        TextNode("error","Provide Data in the TextBox");//are the class name in style sheet

    }
}
function textboxvalue($value)
{
    // $textbox=mysqli_real_escape_string($con); gives error bcz its nor declared here $con
  //  $textbox=mysqli_real_escape_string($GLOBALS['con'],$_POST[$value]);// just for security against sql injections
    $textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox))
    {
        return false;
    }
    else{
        return  $textbox;
    }
}
//messages to display
function TextNode($classname,$msg)
{
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//read data from MYSQL
function getData()
{
    $getQuery="SELECT * FROM books";
    $result=mysqli_query($GLOBALS['con'],$getQuery);//this will return a statement which is stored in the varaible
    if(mysqli_num_rows($result)>0)
    {
        return $result;
        /*while($row=mysqli_fetch_assoc($result))
        {
           // echo "Id:".$row['id']."-Book Name:".$row['book_name']."-Book Publisher:".$row['book_publisher']."-Book Price:".$row['book_price'];//this will return the data above via echo so i used other process to get data in blow table
            return $result;
        }*/
    }

}
// to updation
function updateData(){
    $bookid=textboxvalue("book_id");
    $bookname=textboxvalue("book_name");
    $bookpublisher=textboxvalue("book_publisher");
    $bookprice=textboxvalue("book_price");
    if($bookname && $bookpublisher && $bookprice){
      $updatequery="UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid'";
      if(mysqli_query($GLOBALS['con'],$updatequery)){
          TextNode("success","Record successfully Updated");
      }
      else{
          TextNode("error","Unable to Update Data");
      }
    }
    else {
        TextNode("error","Select Data Using Edit Icon");
    }
}

function deleteData(){
    $bookid=(int)textboxvalue("book_id");// to convert string value into integer
    $deletequery="DELETE FROM books WHERE id=$bookid";
    if(mysqli_query($GLOBALS['con'],$deletequery)){
        TextNode("success","Record  Deleted successfully");
    }
    else{
        TextNode("error","Unable To Delete Record");
    }

}

function  deleteBtn(){
    $result=getData();// to return the results of dataset
    $count=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $count++;
            if($count>3){
                buttonelement("btndeleteall","btn btn-danger","<i class='fas fa-trash'></i>Delete All","deleteall","");
                return;
            }
        }
    }
}


function deletealldata(){
    $delallquery="DROP TABLE books";
    if(mysqli_query($GLOBALS['con'],$delallquery)){
        TextNode("success","All Record Deleted successfully");
        createdb();
    }
    else{
        TextNode("error","Something Went Wrong Record Cannot Deleted");
    }
}
//set ID to textbox
function setId(){
  $getid=getData();
  $id=0;
  if($getid){
      while($row=mysqli_fetch_assoc($getid)){
         $id=$row['id'];

      }
  }
  return($id+1);
}