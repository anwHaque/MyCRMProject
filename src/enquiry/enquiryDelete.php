<?php 
	require '../dbcon.php';
	$Id = $_POST['v'];
	$query = "DELETE FROM enquiry WHERE enquiry_id = '$Id'";
	$result = mysqli_query($con, $query);
	if ($result) 
	{
	 	?>
            <script>
                swal('<?php echo $Id; ?>', " Deleted from table", "success");
                readEnquiry();
            </script>
        <?php
	} 
	else
	{
		?>
            <script>
                swal('<?php echo $Id; ?>', " Not Deleted from table", "error");
                readEnquiry();
            </script>
        <?php
	}
 ?>
