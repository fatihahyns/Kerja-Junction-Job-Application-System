<?php
session_start();
?>

<?php if(!isset($_SESSION['id']))header('Location: signin.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>List of Jobs</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    
    <?php require 'menu.php';?>

<!-- Update Pop up -->
<div class="modal fade" id="updateVacancy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Vacancy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="updatevacancy" method="post" action="updateProcessVacancy.php" >
      <div class="modal-body">
        <input type="hidden" name="updateid" id="updateid">

        <div class="form-group">
      <label class="control-label col-sm-4">Job Title:</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" placeholder="Enter job title" name="job_Title" id="job_Title" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Category:</label>
      <div class="col-sm-12">
        <select class="form-control" name="job_Category" id="job_Category" required>

          <option value="" disabled selected>Select</option>
                    <?php
                        require '../includes/db_connect.php';

                        $sql = mysqli_query($connect, "SELECT category_Name FROM category");

                        while($row = $sql->fetch_assoc()){
                            echo'<option value="'.$row['category_Name'].'">'.$row['category_Name'].'</option>';
                        }
                    ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Salary (RM):</label>
      <div class="col-sm-12">          
        <input type="text" class="form-control" placeholder="Enter salary" name="job_Salary" id="job_Salary" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Qualification:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="2" placeholder="Enter qualification" name="job_Qualification" id="job_Qualification" required></textarea>
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-4">Work Experience:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="2" placeholder="Enter work experience" name="job_Experience" id="job_Experience" required></textarea>
      </div>
     </div>
         <div class="form-group">
      <label class="control-label col-sm-4">Prefered Gender:</label>
      <div class="col-sm-12">
        <select class="form-control" name="job_PreferedGender" id="job_PreferedGender" required>

          <option value="" disabled selected>Select</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                           <option value="Both">Both</option>
        </select>
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-4">Job Description:</label>
      <div class="col-sm-12">      
        <textarea class="form-control"rows="2" placeholder="Enter job description" name="job_Description" id="job_Description" required></textarea>
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
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>List of <b>Posted Jobs</b></h2></div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Job Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Salary (RM)</th>
                        <th class="text-center">Qualification</th>
                        <th class="text-center">Experience</th>
                        <th class="text-center">Prefered Gender</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Date Posted</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../includes/db_connect.php';

                        $i = 1;

                        $sql = "SELECT * FROM job WHERE employer_Name='".$_SESSION['name']."'";

                        $result = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                        Print '<tr>
                        <td align="center">'.$row['job_ID'].'</td>
                        <td align="center">'.$row['job_Title'].'</td>
                        <td align="center">'.$row['job_Category'].'</td>
                        <td align="center">'.number_format($row['job_Salary'], 2).'</td>
                        <td align="center">'.$row['job_Qualification'].'</td>
                        <td align="center">'.$row['job_Experience'].'</td>
                        <td align="center">'.$row['job_PreferedGender'].'</td>
                        <td align="center">'.$row['job_Description'].'</td>
                        <td align="center">'.$row['job_DatePosted'].'</td>
                    '; 
                        $i++;   ?>
                        <td align="center">
                            <a class="edit editbtn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>


                            <a onclick="deleteme(<?php echo $row['job_ID']; ?>)" name="delete" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
   
                    <?php echo "</tr>"; ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function (){
    $('.editbtn').on('click', function () {
    $('#updateVacancy').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#updateid').val(data[0]);
        $('#job_Title').val(data[1]);
        $('#job_Category').val(data[2]);
        $('#job_Salary').val(data[3]);
        $('#job_Qualification').val(data[4]);
        $('#job_Experience').val(data[5]);
        $('#job_PreferedGender').val(data[6]);
        $('#job_Description').val(data[7]);
});
    });
</script>  
</body>
</html>