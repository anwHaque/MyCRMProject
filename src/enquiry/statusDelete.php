<?php 
	require '../dbcon.php';
	$Id = $_POST['Id'];
	$sId = $_POST['sId'];

	$query = "DELETE FROM status WHERE status_id = '$sId'";
	$result = mysqli_query($con, $query);
	if ($result) 
	{
	 	?>
            <script>
                swal('<?php echo $Id; ?>', " Status Deleted from table", "success");
                readEnquiry();
            </script>
        <?php
	} 
	else
	{
		?>
            <script>
                swal('<?php echo $Id; ?>', " Status Not Deleted from table", "error");
                readEnquiry();
            </script>
        <?php
	}
 ?>