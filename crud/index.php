<?php
require_once ("../crud/php/component.php");
//require_once ("../crud/php/databasedb.php");
//createdb();
require_once ("../crud/php/crudoperation.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-warning"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" autocomplete="off" class="form-control" name="book_id" id="inlineFormInputGroup" placeholder="ID" value="<?php setId()?>">
                    </div>
                </div>
                <div class="pt-2">
                    <?php   inputelement("<i class='fas fa-book'></i>","Book Name","book_name","");?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php   inputelement("<i class='fas fa-people-carry'></i>","Publisher","book_publisher","");?>
                    </div>
                    <div class="col">
                        <?php   inputelement("<i class='fas fa-rupee-sign'></i>","Price","book_price","");?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                        <?php  buttonelement("btncreate","btn btn-success","<i class='fas fa-plus'></i>","create","dat-toggle='tooltip'data-placement='bottom'title='create'");   ?>
                        <?php  buttonelement("btnread","btn btn-primary","<i class='fas fa-sync'></i>","read","dat-toggle='tooltip'data-placement='bottom'title='Read'");   ?>
                        <?php  buttonelement("btnupdate","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","dat-toggle='tooltip'data-placement='bottom'title='Update'");   ?>
                        <?php  buttonelement("btndelete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","dat-toggle='tooltip'data-placement='bottom'title='delete'");   ?>
                        <?php  deleteBtn();?>
                </div>
            </form>
        </div>
        <!-- Bootstrap Table-->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Book Price</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <!--<tr>
                    <td>1</td>
                    <td>Book Name</td>
                    <td>Akash PHP</td>
                    <td>130.20</td>
                    <td><i class="fas fa-edit btnedit"></i></td>
                </tr>-->
                <?php
                if (isset($_POST['read']))
                {
                   $result= getData();
                   if($result)
                   {
                       while ($row=mysqli_fetch_assoc($result))
                       {?>
                           <tr>
                               <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                               <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                               <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                               <td data-id="<?php echo $row['id']; ?>"><?php echo '₹'.$row['book_price']; ?></td>
                               <td><i class="fas fa-edit btnedit"data-id="<?php echo $row['id'];?>"></i></td>
                           </tr>

                <?php


                       }
                   }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../crud/php/main.js"></script>
<script src="https://kit.fontawesome.com/fdf7b42592.js" crossorigin="anonymous"></script>

</body>
</html>
