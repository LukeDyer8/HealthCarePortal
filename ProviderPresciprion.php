<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ProviderLogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="EN">
<head>
	<title> Refill Requests </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="testing.css">
</head>
<body>
<br>
<div class = "blueBorder" >
	 <a href = "ProviderAppointment.php"> View Upcomming Appointments </a> 
	 <a href = "ProviderNotes.php"> Create Patient Notes </a> 
	 <a href = "ProviderLogin.php"> Log Out </a> <br>		
</div>
<?php
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","plee8","plee8","plee8");


	$select_query = "SELECT * FROM `patientinfo`,`prescriptioninfo`";

	$select = mysqli_query($db, $select_query);

	if(! $select){
		print("Error - query could not be executed");
		$error = mysqli_error($db);
		print "<p> . $error . </p>";
		exit;
	}
		$num_rows = mysqli_num_rows($select);
		if($num_rows != 0){

?>
<h1> Prescription Refill Requests: </h1>
						<table border="1">
					<tr>
						<th> Patient Name </th>
						<th> Date Of Birth </th>
						<th> Phone Number </th>
						<th> Medication Name </th>
						<th> Medication Dosage </th>
						<th> Frequency </th>
						<th> Pharmacy Name </th>
						<th> Pharmacy Phone Number </th>
					</tr>

<?php

 for($row_num = 0; $row_num < $num_rows; $row_num++){
	print("<tr>");
	$row_array = mysqli_fetch_array($select);
	print("<td>$row_array[fname]</td>");
	print("<td>$row_array[dob]</td>");
	print("<td>$row_array[pnumber]</td>");
	print("<td>$row_array[mname]</td>");
	print("<td>$row_array[dosage]</td>");
	print("<td>$row_array[frequency]</td>");
	print("<td>$row_array[pharmname]</td>");
	print("<td>$row_array[pharmnumber]</td>");
	print("</tr>");		
}
}


	print('</table>');
	print('<br>');

?>
</body>
</html>