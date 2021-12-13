<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Profile</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #404E67;
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
.bttn {        
  font-size: 16px;
  color: white;
  background: #5cd3b4;
  border: none;
  margin-top: 20px;
  min-width: 100px;
  border-radius: 8px;
  padding: 10px;
}
  </style>
</head>
<body>


  <?php require 'menu.php';?>
 <?php
require '../includes/db_connect.php';


 $sql = "SELECT * FROM employer WHERE employer_ID='".$_SESSION['id']."'";
                     
$result = mysqli_query($connect, $sql);

while($rowval = mysqli_fetch_assoc($result)){

$employer_Name= $rowval['employer_Name'];

$employer_ID= $rowval['employer_ID'];

$employer_Address= $rowval['employer_Address'];

$employer_ContactPerson= $rowval['employer_ContactPerson'];

$employer_Email= $rowval['employer_Email'];

$employer_ContactNo= $rowval['employer_ContactNo'];

$employer_Description= $rowval['employer_Description'];

$employer_Website= $rowval['employer_Website'];


}
 ?>

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Company <b>Profile</b></h2></div>
                </div>
            </div>
              <form class="form-horizontal" name="addProfile" method="post" action="updateProfile.php">
    <div class="form-group">
      <label class="control-label col-sm-4">Company Name:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" name="employer_Name" disabled value='<?php echo $employer_Name; ?>'> 
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Contact Person:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"name="employer_ContactPerson" disabled value='<?php echo $employer_ContactPerson; ?>'>
      </div>
    </div>
 
    <div class="form-group">
      <label class="control-label col-sm-4"> Address:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_Address" disabled value='<?php echo $employer_Address; ?>'>
      </div>
     </div>

          <div class="form-group">
      <label class="control-label col-sm-4">Work Email:</label>
      <div class="col-sm-12">
        <input type="email" class="form-control" name="employer_Email" disabled value='<?php echo $employer_Email; ?>'>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-4">Contact No:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_ContactNo" disabled value='<?php echo $employer_ContactNo; ?>'>
      </div>
    </div>

      
      <div class="form-group">
      <label class="control-label col-sm-4"> Description:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_Description" disabled rows="5" value='<?php echo $employer_Description; ?>'>

      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-4">Website:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_Website" disabled value='<?php echo $employer_Website; ?>'>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-8 offset-4">
        
 <button type="submit" class="bttn" name="edit" >Edit</button>
     </form>
  </div>
   

    
    

      </div>
    </div>    

  
  
</body>
</html>