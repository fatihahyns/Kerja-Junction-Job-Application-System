<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: ApplicantSignin.php')?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Feedback</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
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
  background: #5cb656;
  border: none;
  margin-top: 20px;
  min-width: 100px;
  border-radius: 8px;
  padding: 10px;
  #d8544e
}

.bttn1 {        
  font-size: 16px;
  color: white;
  background: #d8544e;
  border: none;
  margin-top: 20px;
  min-width: 100px;
  border-radius: 8px;
  padding: 10px;
  
}



  </style>

</head>
<body>
  <?php require 'ApplicantMenu.php';?>

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Leave Your <b>Feedback</b></h2></div>
                </div>
            </div>
              <form class="form-horizontal" method="post" action="ApplicantFeedback_script.php">
      <div class="form-group">
      <div class="col-sm-12">      
        <textarea class="form-control"rows="5" placeholder="Leave your feedback.." name="txtFeedback" required></textarea>
      </div>
     </div>
                    
    <div class="form-group">        
      <div class="col-8 offset-4">
        <button type="submit" class="bttn" name="button" >Submit</button>
      </div>
    </div>
  </form>
        </div>
    </div>
</div>     
</body>
</html>
