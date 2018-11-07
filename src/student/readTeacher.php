<?php 

	require '../dbcon.php';
	$query = "SELECT * FROM `enquiry` INNER JOIN `status` ON enquiry.enquiry_id = status.status_enquiry_id WHERE enquiry_type ='Teacher' AND status = 'Registered' ";
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
				<th>Attendance</th>
				<th>By Month</th>
				<th>Add Att</th>
			</tr>';
			
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["enquiry_id"];
			$query1 = "SELECT COUNT(*) AS `count` FROM `attendance` WHERE id = '$id' AND attendance = 'Present'";
			$result1 = mysqli_query($con,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$count = $row1['count'];

			$query2 ="SELECT att_month FROM attendance WHERE id = '$id' GROUP BY att_month";
			$result2 = mysqli_query($con,$query2);
			if(mysqli_num_rows($result2) > 0)
			{
				$data2 ='<select name="attDate" id="attDate" onchange="attByMonth(this.value, '.$id.')"><option hide >Months</option>';
				while($row2 = mysqli_fetch_assoc($result2))
				{
					
					 $data2 .= '<option value="'.$row2['att_month'].'">'.$row2['att_month'].'</option>';	
				}
				$data2.='</select';
			}

			$data .= '<tr>
				<td>'.$row["enquiry_id"].'</td>
				<td>'.$row["first_name"].'</td>
				<td>'.$row["last_name"].'</td>
				<td>'.$row["department"].'</td>
				<td>'.$row["enquiry_type"].'</td>
				<td>'.$row["status"].'</td>
				<td id="'.$row["enquiry_id"].'">'.$count.'</td>
				<td>'.$data2.'</td>
				<td><button onclick = "return addAttendance('.$row["enquiry_id"].',\''.$row["enquiry_type"].'\')">Add</button></td>
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