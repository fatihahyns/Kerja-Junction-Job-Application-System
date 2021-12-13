<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: ApplicantSignin.php')?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Search Job</title>
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
	padding: 7px;
}

 .top-right { 
            top: -40%; 
            right: 3%; 
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
                    <div class="col-sm-8"><h2>Search <b>Job</b></h2></div>
                </div>
            </div>
         		  <form class="form-horizontal" name="addvacancy" method="post" action="">

                    <div class="row">
                        <div class="col">
            <input type="text" class="form-control" name="datasearch" placeholder="Search Job Title">
        </div>
        <div class="col">
           <select class="form-control" name="category">

          <option value="" disabled selected>Select Category</option>
          <?php
            require '../includes/db_connect.php';

            $sql = mysqli_query($connect, "SELECT category_Name FROM category");

            while($row = $sql->fetch_assoc()){
              echo'<option value="'.$row['category_Name'].'">'.$row['category_Name'].'</option>';
            }
          ?>
        </select>
        </div>
        <div class="col">
           <select class="form-control" name="qualification">

           <option value="" disabled selected>Select Qualification</option>
                           <option value="SPM">SPM</option>
                           <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                           <option value="Master">Master</option>
                           <option value="PHD">PHD</option>
        </select>
        </div>
    
                    </div>
                    <div class="form-group">        
      <div class="col-8 offset-5"> 
        <button type="submit" class="bttn" name="search" >Search</button>
      </div>

      <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Search <b>Results</b></h2></div>
                </div>
            </div>
    </div>
           
    
  </form>
  <?php
  require '../includes/db_connect.php';

  if (isset($_POST['search'])){


    $sql = "";
    //$datasearch = $_REQUEST['datasearch'];
    //$category = $_REQUEST['category'];
    $datasearch = isset($_POST['datasearch']) ? $_POST['datasearch'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $qualification = isset($_POST['qualification']) ? $_POST['qualification'] : '';

    $ConditionArray = array();
    if ($datasearch != '') $ConditionArray[] = "(job_Title LIKE '%$datasearch%')";
    if ($category != '') $ConditionArray[] = "(job_Category = '$category' OR '$category' = '')";
    if ($qualification != '') $ConditionArray[] = "(job_Qualification = '$qualification' OR '$qualification' = '')";

    if (count($ConditionArray) > 0)
    {
        $sql = "
        SELECT *
        FROM job
        WHERE ".implode(' AND ', $ConditionArray);
    }

    $result = mysqli_query($connect, $sql) or die('error');

      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <table align="center" width="80%" border="1" cellpadding="2" cellspacing="2">
                          <tr>
                          <td><strong>Company Name</strong></td>
                          <td><strong><?php echo $row['employer_Name']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>Job Title</strong></td>
                          <td><strong><?php echo $row['job_Title']; ?></strong></td>
                          </tr>
                          <tr>
                          <tr>
                          <td><strong>Category</strong></td>
                          <td><strong><?php echo $row['job_Category']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>Salary (RM)</strong></td>
                          <td><strong><?php echo number_format($row['job_Salary'], 2); ?></strong></td>
                        </tr>
                        <tr>
                          <td><strong>Preferred Gender</strong></td>
                          <td><strong><?php echo $row['job_PreferedGender']; ?></strong></td>
                        </tr>

                          <tr>
                          <td><strong>Qualification</strong></td>
                           <td><strong><?php echo $row['job_Qualification']; ?></strong></td>
                           </tr>
                           <tr>
                          <td><strong>Experience</strong></td>
                          <td><strong><?php echo $row['job_Experience']; ?></strong></td>
                        </tr>
                           <tr>
                          <td><strong>Description</strong></td>
                          <td><strong><?php echo $row['job_Description']; ?></strong></td>
                        </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td><a href="ApplicantApply.php?job_ID=<?php echo $row['job_ID'];?>">
                             <strong>Apply For Job</strong></a></td>
                           </tr>
                        </table>
                        <br>
                <?php    
        }

      }

      else{ ?>
        <p>No matching records found. Try different filter.</p>

      <?php
        }

    
    
  }
?>
        </div>
    </div>

</div>     
</body>
</html>