<?php 
	require '../dbcon.php';
	require 'enquiryForm.php';
	$Id = $_POST['Id'];
	$query = "SELECT * FROM `enquiry` INNER JOIN `status` ON enquiry.enquiry_id = status.status_enquiry_id WHERE enquiry.enquiry_id='$Id'";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result); 
		$Id = $row['enquiry_id'];
		$fName = $row["first_name"];
		$lName = $row["last_name"];
		$dep = $row["department"];
		$type = $row["enquiry_type"];
		$sId = $row["status_id"];
		$status = $row["status"];
		$sdate = $row["status_date"];
	}
 ?>

 <script>
 	var type = '<?php echo $type ?>';
 	var Id = '<?php echo $Id ?>';
 	var sId = '<?php echo $sId ?>';
 	
 	$('#firstName').val('<?php echo $fName ?>');
 	$('#lastName').val('<?php echo $lName ?>');
 	$('#depName').val('<?php echo $dep ?>');
 	$('#typeSelect').val(type);

 	selectTypeFun(type);

 	$('#stateSelect').val('<?php echo $status ?>');
 	$('#stateDate').val('<?php echo $sdate ?>');
 	
 	$('#btnSubmit').replaceWith('<button id="enquiryUpdate" onclick="return enquiryEditSave('+Id+','+sId+')" >Update</button>');

 </script>