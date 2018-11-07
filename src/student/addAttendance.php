<?php 
    require '../enquiry/enquiryEdit.php';
	$Id = $_POST['Id'];
	$type = $_POST['type'];

 ?>

 <script>
 	var Id = '<?php echo $Id ?>';
 	var type = '<?php echo $type ?>';
 	// console.log(type);
	$('#addAttendance').replaceWith('<label for="att">Select Attendance:</label><br><select name="att" id="att"><option value="Present" >Present</option><option value="Absent" >Absent</option></select><input type="date" name="attDate" id="attDate">')

 	$('#enquiryUpdate').replaceWith('<button id="attBtn" onclick="return attSave(\''+type+'\','+Id+')" >Save Attendance</button>');
 	document.getElementById('attDate').valueAsDate = new Date();

 	$("#reset").hide();
 	document.getElementById("firstName").disabled = true;
    document.getElementById("lastName").disabled = true;
    document.getElementById("depName").disabled = true;
    document.getElementById("typeSelect").disabled = true;
 </script>