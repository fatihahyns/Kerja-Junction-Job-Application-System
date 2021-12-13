<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<?php 
    require '../includes/db_connect.php';

    if (isset($_POST["add"])){

    $id  = isset($_POST['category_ID']) ? $_POST['category_ID'] : '';
    $category = isset($_POST['category_Name']) ? $_POST['category_Name'] : '';
        
    $sql = "INSERT INTO category (category_ID, category_name) values ('$id', '$category')"; 

    $result = mysqli_query($connect, $sql);
        
            if ($result)
            {

                echo '<script>alert(New data added.");</script>';
                echo "<script>window.location.href ='manageCategory.php'</script>";
            }
        
            else
            {
                //echo "Query failed. $connect->error";
                echo '<script>alert("Failed to add new data. Please try again.");</script>';
                echo "<script>window.location.href ='manageCategory.php";
            }   
            
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Manage Category</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Roboto', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
</head>
<body>

<?php require 'menu.php';?>

<!-- Add Category Pop up -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="industry" method="post" action="" >
      <div class="modal-body">
          <div class="form-group">
              <label class="control-label col-sm-4">Category Name:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Enter category name" name="category_Name" required>
              </div>
        </div>
    
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
        <button type="submit" class="btn btn-success" name="add">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ----------------------------------------------------------------------------------------------->
<!-- Update Pop up -->
<div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="updatecategory" method="post" action="updateProcessCategory.php" >
      <div class="modal-body">
        <input type="hidden" name="updateid" id="updateid">
          <div class="form-group">
              <label class="control-label col-sm-4">Category Name:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Enter category name" name="category_Name" id="category_Name" required>
              </div>
        </div>
    
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
        <button type="submit" class="btn btn-success" name="update">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ----------------------------------------------------------------------------------------------->
<!-- Table -->
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>List of <b>Categories</b></h2></div>
                    <div class="col-sm-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead align="center">
                    <tr >
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                        $sql = "SELECT * FROM category";

                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                        Print '<tr>
                        <td align="center">'.$row['category_ID'].'</td>
                        <td align="center">'.$row['category_Name'].'</font></td>
                        '; 
                        $i++;?>
                        <!--<td align="center"><button class="btn" onclick="window.location='updateCategory.php?GetID=<?php echo $row['category_ID']; ?>'"><i class="far fa-edit"</i></button></td>
                        <td align="center"><button class="btn2" onClick="deleteme(<?php echo $row['category_ID']; ?>)"><i class="fa fa-trash"</i></button></td> -->
                        <td>
                        <a class="edit editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" name="delete" onclick="deleteme(<?php echo $row['category_ID']; ?>)" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>



                
                    <?php echo "</tr>"; ?>
                    <script type="text/javascript">
                function deleteme(delid)
                {
                    if (confirm("Are you sure want to delete?")){
                        window.location.href='deleteCategory.php?DelID='+delid+'';
                        return true;
                    }
                }
                </script>

        <?php
        }
        //Retrieve Number of records returned
            $records = mysqli_num_rows($result);
    ?>
    				<tr>
                        <td colspan="3"><div align="left"><?php echo "<b>Total: ".$records." Records</b>"; ?> </div></td>
                      </tr>
     					
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function (){
    $('.editbtn').on('click', function () {
    $('#updateCategory').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#updateid').val(data[0]);
        $('#category_Name').val(data[1]);
});
    });
</script>     
</body>
</html>