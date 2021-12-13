<?php
    require "HomepageMenu.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employer</title>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <style type="text/css">
    body {
      color: black;
      background: url("image/background3.jpg"); /* background*/
      -webkit-background-size:cover;
      background-repeat:no-repeat;
      background-position: center center;
      font-family: 'Roboto', sans-serif;
    }

    footer {
  font-family: 'Roboto', sans-serif;
  background-color: #343a40;
  padding: 10px;
  text-align: center;
  color: white;
}
</style>
<body>
    <div class="box-area">
        <table width="20%" align="center" border="1" cellspacing="2" cellpadding="2" bgcolor="#D08629">
        <td><h2><center><b>List of Employer<b><center></h2></td>
        </table>
        <br>
        <p>     
              <table width="60%" bgcolor="white" align="center" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
				<tr>
				<th height="32" bgcolor="#D08629" class="style3"><div align="center" class="style9 style5 style2"><strong>Company Name</strong></div></th>
				<th bgcolor="#D08629" class="style3"><div align="center" class="style9 style5 style2"><strong>Contact Person</strong></div></th>
				<th bgcolor="#D08629" class="style3"><div align="center" class="style9 style5 style2"><strong>Contact Number</strong></div></th>
                <th bgcolor="#D08629" class="style3"><div align="center" class="style9 style5 style2"><strong>Email</strong></div></th>
				</tr>
				<?php
				// Establish Connection with Database				
				require "includes/db_connect.php";

				// Specify the query to execute
				$sql = "SELECT `employer_Name`,`employer_ContactPerson`,`employer_ContactNo`,`employer_Email` FROM employer";
				// Execute query
				$result = mysqli_query($connect, $sql);
				// Loop through each records
				//var_dump($result);
				while($row = mysqli_fetch_array($result))
				{
				$CompanyName=$row['employer_Name'];
				$ContactPerson=$row['employer_ContactPerson'];
                $ContactNo=$row['employer_ContactNo'];
				$Email=$row['employer_Email'];

				?>
				<tr>
				<td class="style3"><div align="center" class="style9 style5"><strong><?php echo $CompanyName;?></strong></div></td>
				<td class="style3"><div align="center" class="style9 style5"><strong><?php echo $ContactPerson;?></strong></div></td>
				<td class="style3"><div align="center" class="style9 style5"><strong><?php echo $ContactNo;?></strong></div></td>
                <td class="style3"><div align="center" class="style9 style5"><strong><?php echo $Email;?></strong></div></td>
				</tr>
				<?php
				}				
                ?>

				
				</table>
				   
                </p>
              
            <p class="btn-more box noprint">&nbsp;</p>
        
        
    </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
  Copyright © 2020 KERJA JUNCTION. All rights reserved. Developed by <a href="members.php" target="_blank">Members.</a>
</body>
</html>