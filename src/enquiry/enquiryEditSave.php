<?php 
	 require '../dbcon.php';
	$Id = $_POST['Id'];
	$sId = $_POST['sId'];
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $depName = $_POST['depName'];
    $typeSelect = $_POST['typeSelect'];
    $stateSelect = $_POST['stateSelect'];
    $stateDate = $_POST['stateDate'];

    $query = "UPDATE enquiry SET first_name = '$firstName', last_name = '$lastName', department = '$depName', enquiry_type = '$typeSelect' WHERE enquiry_id = '$Id'";
    $query1 = "UPDATE `status` SET `status`='$stateSelect', status_date = '$stateDate' WHERE status_id = '$sId' ";
    $result = mysqli_query($con,$query);
    $result1 = mysqli_query($con,$query1);
    if ($result && $result1 == true) 
    {
    	 ?>
            <script>
                swal('<?php echo $Id ?>', " Edited Successfully", "success");
                readEnquiry();
            </script>
        <?php	
    }
    else
    {
        ?>
            <script>
                swal('<?php echo $Id ?>', " Status not Updated", "error");
                readEnquiry();
            </script>
        <?php
    	// echo mysqli_error($con);
    }
?>