<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: ApplicantSignin.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Inbox</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    cursor: pointer;
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #d15952;
}
table.table td i {
    font-size: 19px;
}    

.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
</head>
<body>
    
    <?php require 'ApplicantMenu.php';?>

<!-- ----------------------------------------------------------------------------------------------->
<!-- Table -->
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Inbox</b></h2></div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        
                        <th class="text-center">No.</th>
                        <th class="text-center">Company Name</th>
                        <th class="text-center">Job Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Message</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                        $sql = "SELECT job.job_ID, job.employer_Name, job.job_Title, jobapplication.application_Status, jobapplication.jobseeker_ID, jobapplication.application_Message FROM jobapplication, job WHERE jobapplication.job_ID=job.job_ID and jobapplication.jobseeker_ID='".$_SESSION['id']."'";

                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                        Print '<tr>
                        <td align="center" >'.$i.'</td>
                        <td align="center">'.$row['employer_Name'].'</td>
                        <td align="center">'.$row['job_Title'].'</td>
                        <td align="center">'.$row['application_Status'].'</td>
                        <td align="center">'.$row['application_Message'].'</td>
                        </tr>'; 
                        $i++;?>
                        
        <?php
        }
        //Retrieve Number of records returned
            $records = mysqli_num_rows($result);
    ?>
                    <tr>
                        <td colspan="5"><div align="left"><?php echo "<b>Total: ".$records." Records</b>"; ?> </div></td>
                      </tr>
                        
                </tbody>
            </table>
           
        </div>
    </div>  
</div>   

</body>
</html>