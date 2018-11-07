<?php 
require '../dbcon.php';
$Id = $_POST['Id'];
$type = $_POST['type'];
$att = $_POST['att'];
$attDate = $_POST['attDate'];
$newDate = new DateTime($attDate);
$d = $newDate->format('d');
$m = $newDate->format('m');
$y = $newDate->format('y');
 $query = "INSERT INTO attendance(type,attendance,att_date,att_day,att_month,att_year,id) VALUES ('$type','$att','$attDate',$d,$m,$y,'$Id')";
    $result = mysqli_query($con,$query);
                
    if($result == true)
    {
    	// echo "data inserted";
    	if ($type == 'Student') {
    		?>
            <script>
                swal('<?php echo $Id ?>', " Attendance Updated", "success");
                readStudent();
            </script>
        <?php
    	}
    	else
    	{
    		?>
            <script>
                swal('<?php echo $Id ?>', " Attendance Updated", "success");
                readTeacher();
            </script>
        <?php
    	}
        
    }
    else
    {
    	// echo "data not inserted";
        ?>
            <script>
                swal('<?php echo $Id ?>', " Attendance not Updated", "error");
                readStudent();
            </script>
        <?php
    }  
 ?>