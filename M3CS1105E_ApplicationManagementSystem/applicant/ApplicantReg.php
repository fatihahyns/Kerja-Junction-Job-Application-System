<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>JOBSEEKER | Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
  color: black;
  background: #fff; /* background*/
  font-family: 'Roboto', sans-serif;
}
.form-control {
  height: 40px;
  box-shadow: none;
  color: #969fa4;
}
.form-control:focus {
  border-color: #5cb85c;
}
.form-control, .btn {        
  border-radius: 3px;
}
.signup-form {
  width: 600px;
  margin: 0 auto;
  padding: 30px 0;
    font-size: 15px;
}
.signup-form h2 {
  color: #636363;
  margin: 0 0 15px;
  position: relative;
  text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
  content: "";
  height: 2px;
  width: 50%;
  background: #d4d4d4;
  position: absolute;
  top: 120%;
  z-index: 2;
} 
.signup-form h2:before {
  left: 0;
}
.signup-form h2:after {
  right: 0;
}
.signup-form .hint-text {
  color: #999;
  margin-bottom: 30px;
  text-align: center;
}
.signup-form form {
  color: #999;
  border-radius: 3px;
  margin-bottom: 15px;
  background: #f7f7f7; /* background form*/
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 30px;
}
.signup-form .form-group {
  margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
  margin-top: 3px;
}
.signup-form .btn {        
  font-size: 16px;
  font-weight: bold;    
  min-width: 140px;
  outline: none !important;
}
.signup-form .row div:first-child {
  padding-right: 10px;
}
.signup-form .row div:last-child {
  padding-left: 10px;
}     
.signup-form a {
  color: #fff;
  text-decoration: underline;
}
.signup-form a:hover {
  text-decoration: none;
}
.signup-form form a {
  color: #507cc0;
  text-decoration: none;
} 
.signup-form form a:hover {
  text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
<form action="ApplicantData.php" method="post" enctype="multipart/form-data">
    <h2>Jobseeker Register</h2>
    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
      <div class="form-group">
            <input type="text" class="form-control" name="jobseeker_Name" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="jobseeker_Nationality" placeholder="Nationality" required="required">
        </div>
        <div class="form-group">
      <div>
        <select class="form-control" name="jobseeker_Gender" required>

          <option value="" disabled selected>Select Gender</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
        </select>
      </div>
    </div>
    <div class="form-group">
            <input type="date" class="form-control" name="jobseeker_BirthDate" placeholder="Date of Birth" required="required">
    </div>
        <div class="form-group">
            <input type="text" class="form-control" name="jobseeker_Phone" placeholder="Contact Number" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="jobseeker_Qualification" placeholder="Highest Qualification" required="required">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="jobseeker_Resume" accept="application/pdf" required="required">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name="jobseeker_Address" placeholder="Address" required="required"></textarea>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="jobseeker_Email" placeholder="Email" required="required">
        </div>
            <div class="form-group">
            <input type="text" class="form-control" name="jobseeker_Username" placeholder="Username" required="required">
        </div>
    <div class="form-group">
            <input type="password" class="form-control" name="jobseeker_Password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="appregister" class="btn btn-primary btn-lg btn-block">Register Now</button>
        </div>
                 </form>
                 <div class="text-center">Already have an account? <a href="ApplicantSignin.php"><font color="#507cc0">Login</font></a></div>
              </div>    
</div> 
</body>
</html>