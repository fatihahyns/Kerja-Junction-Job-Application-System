<?php
session_start();
?>

<?php if(!isset($_SESSION['idadmin']))header('Location: signin.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Manage Jobseeker</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
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
table.table td a.view {
    color: #6E9EDA;
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


.tables {
    display: table;
    border-collapse: collapse;
     text-align: left;
    border-spacing:10px;
    table-layout: fixed;
     width: 100%;
}
.rows {
    display: table-row;
    border: 1px solid #e9e9e9;
}
.cells {
    display: table-cell;
    padding:8px;
    border: 1px solid #e9e9e9;
}
</style>
</head>
<body>

<?php require 'menu.php';?>


<!-- Table -->
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>List of <b>Jobseekers</b></h2></div>
                </div>
            </div>
            <table class="table">
                <thead align="center">
                    <tr class="d-flex">
                        <th class="col-2">No.</th>
                        <th class="col-8">Name</th>
                        <th class="col-6">Contact No.</th>
                        <th class="col-9">Email</th>
                        <th class="col-6">Highest Qualification</th>
                        <th class="col-5">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                        $sql = "SELECT * FROM jobseeker";

                        //$sql = "SELECT A.*, E.* FROM applicant A INNER JOIN applicant_education E ON A.app_ID = E.app_ID";



                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){

                        Print '<tr class="d-flex">
                        <td align="center" class="col-2">'.$i.'</td>
                        <td align="center" class="col-8">'.$row['jobseeker_Name'].'</font></td>
                        <td align="center" class="col-6">'.$row['jobseeker_Phone'].'</td>
                        <td align="center" class="col-9">'.$row['jobseeker_Email'].'</td>
                        <td align="center" class="col-6">'.$row['jobseeker_Qualification'].'</td>
                        '; 
                        $i++;?>
                        <td align="center" class="col-5">
                        <a class="view viewbtn" href="#view<?php echo $row['jobseeker_ID'];?>" data-sfid data-toggle="modal" title="Edit"><i class="material-icons">visibility</i></a>
                        <a class="delete" name="delete" onclick="deleteme(<?php echo $row['jobseeker_ID']; ?>)" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>

                    <?php echo "</tr>"; ?>

                    <!-- View Pop up -->
<div class="modal fade" id="view<?php echo $row['jobseeker_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Jobseeker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tables ">
        <div class="rows">
            <div class="cells"><b>Name</b></div>
            <div class="cells"><?php echo $row['jobseeker_Name'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Nationality</b></div>
            <div class="cells"><?php echo $row['jobseeker_Nationality'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Gender</b></div>
            <div class="cells"><?php echo $row['jobseeker_Gender'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Birth Date</b></div>
            <div class="cells"><?php echo $row['jobseeker_BirthDate'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Contact Number</b></div>
            <div class="cells"><?php echo $row['jobseeker_Phone'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Email</b></div>
            <div class="cells"><?php echo $row['jobseeker_Email'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Highest Qualification</b></div>
            <div class="cells"><?php echo $row['jobseeker_Qualification'];?></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Resume</b></div>
            <div class="cells"><a href="../applicant/upload/<?php echo $row['jobseeker_ResumeName'];?>" target="_blank" >View</a></div>
        </div>
        <div class="rows">
            <div class="cells"><b>Address</b></div>
            <div class="cells"><?php echo $row['jobseeker_Address'];?></div>
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

                    <script type="text/javascript">
                function deleteme(delid)
                {
                    if (confirm("Are you sure want to delete?")){
                        window.location.href='deleteApplicant.php?DelID='+delid+'';
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
 

 
</body>
</html>