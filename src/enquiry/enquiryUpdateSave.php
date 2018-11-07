<?php 
	require '../dbcon.php';
	$status = $_POST['stateSelect'];
	$statusDate = $_POST['stateDate'];
    $Id = $_POST['Id'];
	
	for ($i=0; $i < sizeof($status) ; $i++) { 
        $query1 = "SELECT status FROM `status` WHERE status_enquiry_id = '$Id' AND status ='$status[$i]'";
        $result1 = mysqli_query($con,$query1);
        if(mysqli_num_rows($result1) > 0)
        {
            ?>
                <script>
                    swal('<?php echo $status[$i] ?>', " Status Allready Exist", "error");
                    readEnquiry();
                </script>
            <?php
        }
        else
        {
            $query = "INSERT INTO status(status,status_date,status_enquiry_id) VALUES ('$status[$i]','$statusDate[$i]','$Id')";
            $result = mysqli_query($con,$query);
                
            if($result == true)
            {
                ?>
                    <script>
                        swal('<?php echo $Id ?>', " Status Updated", "success");
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
            }  
        }
    }
    
 ?>