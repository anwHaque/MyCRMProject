<button class="btn btn-primary" onclick="addEnquiry()">Add Enquiry</button>

<?php 

	require '../dbcon.php';
	$query = "SELECT * FROM `enquiry` INNER JOIN `status` ON enquiry.enquiry_id = status.status_enquiry_id ";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0)
	{
		
		$data = '<table class="table table-bordered table-secondary table-hover">
			<tr>
				<th>ID</th>
				<th>fName</th>
				<th>lName</th>
				<th>Department</th>
				<th>Type</th>
				<th>Status</th>
				<th>StatusDate</th>
				<th>Edite</th>
				<th colspan="2">StatusOperation</th>
				<th>Delete</th>
			</tr>';
			
		while ($row = mysqli_fetch_assoc($result)) {
			
			$data .= '<tr>
				<td>'.$row["enquiry_id"].'</td>
				<td>'.$row["first_name"].'</td>
				<td>'.$row["last_name"].'</td>
				<td>'.$row["department"].'</td>
				<td>'.$row["enquiry_type"].'</td>
				<td>'.$row["status"].'</td>
				<td>'.$row["status_date"].'</td>
				<td><button onclick="return enquiryEdit('.$row["enquiry_id"].')">Edit</button></td>
				<td colspan="2"><button onclick="return enquiryUpdate('.$row["enquiry_id"].',\''.$row["enquiry_type"].'\')">Update</button><button onclick = "return statusDelete('.$row["enquiry_id"].','.$row["status_id"].')">Delete</button></td>
				<td><button onclick="return enquiryDelete('.$row["enquiry_id"].')">Delete</button></td>
			</tr>';
		}
		echo $data;
	}
	else
	{
		?>
            <script>
                swal("Opps..!", " Status not Updated", "error");
                readEnquiry();
            </script>
        <?php
	}
 ?>
