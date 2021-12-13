<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<?php
     require '../includes/db_connect.php';
    require 'menu.php'; 


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

 

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Update Profile</b></h2></div>
                </div>
            </div>
              <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                  <label class="control-label col-sm-4">Company Name:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="employer_Name" onfocus="this.value=''" value='<?php echo $employer_Name; ?>'> 
                  </div>
                </div>

              <div class="form-group">
                <label class="control-label col-sm-4">Contact Person:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control"name="employer_ContactPerson" onfocus="this.value=''" value='<?php echo $employer_ContactPerson; ?>'>
                </div>
              </div>

            <div class="form-group">
              <label class="control-label col-sm-4">Address:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control"  name="employer_Address" onfocus="this.value=''" value='<?php echo $employer_Address; ?>'>
              </div>
             </div>


              <div class="form-group">
          <label class="control-label col-sm-4">Work Email:</label>
          <div class="col-sm-12">
            <input type="email" class="form-control" name="employer_Email" onfocus="this.value=''" value='<?php echo $employer_Email; ?>'>
          </div>
        </div>


    <div class="form-group">
      <label class="control-label col-sm-4">Contact No:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_ContactNo" onfocus="this.value=''" value='<?php echo $employer_ContactNo; ?>'>
      </div>
    </div>

      
      <div class="form-group">
      <label class="control-label col-sm-4"> Description:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_Description"  rows="5" onfocus="this.value=''" value='<?php echo $employer_Description; ?>'>

      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-4">Website:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control"  name="employer_Website" onfocus="this.value=''" value='<?php echo $employer_Website; ?>'>
      </div>
    </div>

     <center><button type="submit" class="bttn" name="update" >Save Changes</button></center>

        </form>
</div>
        </div>
    </div>
</div>  
  
</body>
</html>



<?php
  if (isset($_POST['update'])){
  $employer_ContactPerson = isset($_POST['employer_ContactPerson']) ? $_POST['employer_ContactPerson'] : '';
  $employer_Name = isset($_POST['employer_Name']) ? $_POST['employer_Name'] : '';
  $employer_Address = isset($_POST['employer_Address']) ? $_POST['employer_Address'] : '';
  $employer_ContactNo = isset($_POST['employer_ContactNo']) ? $_POST['employer_ContactNo'] : '';
  $employer_Email = isset($_POST['employer_Email']) ? $_POST['employer_Email'] : '';
  $employer_Description = isset($_POST['employer_Description']) ? $_POST['employer_Description'] : '';
  $employer_Website = isset($_POST['employer_Website']) ? $_POST['employer_Website'] : '';


  $sql = "UPDATE employer SET employer_Name='$employer_Name', employer_ContactPerson='$employer_ContactPerson',employer_Address='$employer_Address', employer_ContactNo='$employer_ContactNo', employer_Email='$employer_Email', employer_Description='$employer_Description', employer_Website='$employer_Website' WHERE employer_ID = '".$_SESSION['id']."' ";

  $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
  if($result)
  {
    echo '<script>alert("Data updated.");</script>';
    echo "<script>window.location.href ='manageProfile.php'</script>";
  }
  else
  {
    echo '<script>alert("Failed to update the data. Please try again.");</script>';
    echo "<script>window.location.href ='manageProfile.php";
  }
}
?>