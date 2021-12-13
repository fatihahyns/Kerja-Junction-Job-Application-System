<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Feedback</title>
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
    width: 1000px;
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
table td a.add i {
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

<!-- View Pop up -->
<div class="modal fade" id="viewCompany<?php echo $row['employer_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<input type="hidden" name="updateid" id="updateid">-->
          <div class="form-group">
              <label class="control-label col-sm-4">Company Name:</label>
              <div class="col-sm-12">
                <?php echo $row['employer_Name'];?>
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
                    <div class="col-sm-8"><h2>Feed<b>backs</b></h2></div>
                </div>
            </div>
            <table class="table">
                <thead align="center">
                    <tr class="d-flex">
                        <th class="col-3">No.</th>
                        <th class="col-12">Name</th>
                        <th class="col-12">Feedback</th>
                        <th class="col-8">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                        $sql = "SELECT * FROM feedback";

                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                        Print '<tr class="d-flex">
                        <td align="center" class="col-3">'.$i.'</font></td>
                        <td align="center" class="col-12">'.$row['jobseeker_Name'].'</td>
                        <td align="center" class="col-12">'.$row['feedback_Description'].'</td>
                        <td align="center" class="col-8">'.$row['feedback_Date'].'</td>
                        '; 
                        $i++;?>
                        

                    <?php echo "</tr>"; ?>
     

        <?php
        }
        //Retrieve Number of records returned
            $records = mysqli_num_rows($result);
    ?>
                    <tr class='table borderless'>
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
</body>
</html>