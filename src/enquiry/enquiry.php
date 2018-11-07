<?php
    require '../dbcon.php';
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $depName = $_POST['depName'];
    $typeSelect = $_POST['typeSelect'];
    $stateSelect = $_POST['stateSelect'];
    $stateDate = $_POST['stateDate'];
    if (!empty($firstName) && !empty($lastName) && !empty($depName) && !empty($typeSelect) && !empty($stateSelect) && !empty($stateSelect)) {
        
        $query = "INSERT INTO enquiry(first_name,last_name,department,enquiry_type) VALUES ('$firstName','$lastName','$depName','$typeSelect')";
    	$result = mysqli_query($con,$query);
    	if($result == true)
    	{
            
            $last_id = mysqli_insert_id($con);
            $query1 = "INSERT INTO status(status,status_date,status_enquiry_id) VALUES ('$stateSelect','$stateDate','$last_id')";
            $result1 = mysqli_query($con,$query1);
            if($result1 == true)
            {
                
                ?>
                    <script>
                        swal('<?php echo $firstName ?>', " Added Successfuly", "success");
                        readEnquiry();
                    </script>
                <?php
            }
            else
            {
               ?>
                    <script>
                        swal('<?php echo $firstName ?>', " Somthing Wrong1", "error");
                        readEnquiry();
                    </script>
                <?php 
            }
        
           
        }
        else
        {
            ?>
                <script>
                    swal('<?php echo $firstName ?>', " Somthing Wrong2", "error");
                    readEnquiry();
                </script>
            <?php 
        }
    }
    else
    {
        ?>
            <script>
                swal('Opps..!', " Please Enter Detail", "error");
                
            </script>
        <?php
    }
?>