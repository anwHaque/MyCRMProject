<?php
require 'src/dbcon.php';

	$id=29;
	$query2 ="SELECT att_date FROM attendance  WHERE id='$id'";
	$result2 = mysqli_query($con,$query2);
		if(mysqli_num_rows($result2) > 0)
		{

			while($row2 = mysqli_fetch_assoc($result2))
			{
				$date = $row2['att_date'];
				$newDate = new DateTime($date);
				echo $newDate->format('m').'<br>';
				
			}
		}
		else{
			echo "date not found";
		}

?>