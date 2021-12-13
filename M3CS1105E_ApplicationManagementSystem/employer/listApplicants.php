<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>List of Applicants</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
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
    color: #5dbfda;
}
table.table td a.accept {
    color: #5db55f;
}
table.table td a.deny {
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Contact No.</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Applied Job</th>
                        <th class="text-center">Resume</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                      /* A: jobapplication
						B: jobseeker
						C: job*/

                        $sql = "SELECT A.*, B.*, C.* FROM jobapplication A, jobseeker B, job C WHERE B.jobseeker_ID = A.jobseeker_ID AND A.job_ID = C.job_ID AND C.employer_Name = '".$_SESSION['name']."'";



                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                        Print '<tr>
                        <td align="center">'.$i.'</td>
                        <td align="center">'.$row['jobseeker_Name'].'</td>
                        <td align="center">'.$row['jobseeker_Phone'].'</td>
                        <td align="center">'.$row['jobseeker_Email'].'</td>
                        <td align="center">'.$row['job_Title'].'</td>
                        
                    '; 
                        $i++;   ?>

                        <td align="center">
                            <a class="view" href="#view<?php echo $row['jobseeker_ID'];?>" data-toggle="modal" title="View">view</a>
                        </td>

                        <?php echo '<td align="center">'.$row['application_Status'].'</td>'; ?>
                            

                    <td align="center">
                            <a class="accept" data-toggle="modal" title="Accept" 

                            <?php if ($row['application_Status'] == 'Accepted' || $row['application_Status'] == 'Rejected')
                            {?> 
                            	href="#" 

                            <?php } 
                            else {?> 

                            	href="#message<?php echo $row['application_ID'];?>" 
                            	<?php } ?>

                            	><span class="fa fa-check"></span></a>


                            	<a class="deny" data-toggle="modal" title="Reject" 

                            <?php if ($row['application_Status'] == 'Accepted' || $row['application_Status'] == 'Rejected')
                            {?> 
                            	href="#" 

                            <?php } 
                            else {?> 

                            	href="#reject<?php echo $row['application_ID'];?>" 
                            	<?php } ?>

                            	><span class="fa fa-close"></span></a>



                    </td>

                    <?php echo "</tr>";?>

                    <!-- View Pop up -->
<div class="modal fade" id="view<?php echo $row['jobseeker_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tables ">
        <div class="rows">
            <div class="cells"><b>Applicant Name</b></div>
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
<!-- Message Pop up -->
<div class="modal fade" id="message<?php echo $row['application_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="message" method="post" action="acceptApplication.php?ID=<?php echo $row['application_ID'];?>" >
      <div class="modal-body">
          <div class="form-group">
              <div class="col-sm-12">      
        		<input type="hidden" class="form-control" name="jobseeker_ID" value="<?php echo $row['jobseeker_ID'] ?>" required>
      </div>
  </div>
   <div class="form-group">
              <div class="col-sm-12">      
        		<input type="hidden" class="form-control" name="job_ID" value="<?php echo $row['job_ID'] ?>" required>
      </div>
  </div>
      <div class="form-group">
              <div class="col-sm-12">      
        <textarea class="form-control"rows="5" placeholder="Enter message here.." name="application_Message" required></textarea>
      </div>
        </div>
    
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <button type="submit" class="btn btn-success" name="send">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ----------------------------------------------------------------------------------------------->
<!-- Rejevy Pop up -->
<div class="modal fade" id="reject<?php echo $row['application_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="message" method="post" action="rejectApplication.php?ID=<?php echo $row['application_ID'];?>" >
      <div class="modal-body">
          <input type="hidden" class="form-control" name="jobseeker_ID" value="<?php echo $row['jobseeker_ID'] ?>" required>
			<input type="hidden" class="form-control" name="job_ID" value="<?php echo $row['job_ID'] ?>" required>
		<input type="hidden" class="form-control" name="application_Message" value="<?php echo $row['application_Message'] ?>" required>

		<h5><center>Are you sure to reject this application? This method cannot be undone.</center></h5>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="reject">Reject</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ----------------------------------------------------------------------------------------------->

                <script type="text/javascript">
                function deleteme(delid)
                {
                    if (confirm("Are you sure want to delete?")){
                        window.location.href='deleteVacancy.php?DelID='+delid+'';
                        return true;
                    }
                }
                </script>
                <?php
        }
            // Retrieve Number of records returned
            $records = mysqli_num_rows($result);
    ?>
                      <tr>
                        <td colspan="11"><div align="left"><?php echo "<b>Total: ".$records." Records</b>"; ?> </div></td>
                      </tr>
                    
                </tbody>
            </table>
           
        </div>
    </div>  
</div>   
</body>
</html>