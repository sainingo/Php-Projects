<?php
require_once("function.php"); 
// require_once("db.php");
 //createDb();
require_once("operation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Php Project</title>
    <script src="https://kit.fontawesome.com/9a7bb52a03.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Book Store</h1>
       
       <div class="d-flex justify-content-center">
       <form action="" method="post" class="w-50">
         <div class="pt-2">
         <?php inputElement("<i class='fas fa-id-badge'></i>","ID","id","")?>
           
         </div>
         <div class="pt-2">
          <?Php
          inputElement("<i class='fas fa-book'></i>","book name","book_name","");
         ?>
         </div>
         <div class="row pt-2">
            <div class="col">
            <?php inputElement("<i> class='fas fa-people-carry'></i>","publisher","book_publisher","")?>
            </div>
            <div class="col">
            <?php inputElement("<i> class='fas fa-dollar-sign'></i>","price","book_price","")?>
            </div>
         </div>
         <div class="d-flex justify-content-center">
           <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","dat-toogle='tooltip' data-placement='bottom' title='create'");?>
           <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","dat-toogle='tooltip' data-placement='bottom' title='Read'");?>
           <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","dat-toogle='tooltip' data-placement='bottom' title='update'");?>
           <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","dat-toogle='tooltip' data-placement='bottom' title='delete'");?>
           <?php deleteAll();?>
         </div>
       </form>
       </div>  
       <!-- Boostrap table -->
       <div class="d-flex table-data">
            <table class="table table-striped table-dark">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Book price</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <!-- pass the getDta function here and clear the tr section -->
                <?php
                if(isset($_POST['read'])){
                    $result = getData();

                    if($result){
                        while($row = mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td data-id="<?php echo $row['id']?>"><?php echo $row['id'];?></td>
                                <td data-id="<?php echo $row['id']?>"><?php echo $row['book_name'];?></td>
                                <td data-id="<?php echo $row['id']?>"><?php echo $row['book_publisher'];?></td>
                                <td data-id="<?php echo $row['id']?>"><?php echo '$'. $row['book_price'];?></td>
                                <td><i class="fas fa-btnedit" data-id="<?php echo $row['id']?>"></i></td>
                            </tr>
                        <?php
                            
                        }
                    }
                }
                ?>
             
              <tbody id="tbody">
                <tr>
                    <td>1</td>
                    <td>Book name</td>
                    <td>Daily Nation</td>
                    <td>50.99</td>
                    <td><i class="fas fa-edit btnedit"></i></td>
                </tr>
              </tbody>
            </table>
       </div>

    </div>
</main>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<<script src="main.js"></script>
</body>
</html>