<?php
require 'test.php';
?>

<script>
	document.getElementById('errr').innerHTML = '<input type="submit" name="statusUpdate" id="statusUpdate" value="Update Status">';
</script>
<?php 
if (isset($_POST['statusUpdate'])) {
	$str = $_POST['name'];
	$ar = explode("-", $str);
	foreach ($ar as $key => $value) {
		echo $value."<br>";
	}
}
else
{
	echo "somthing wrong";
}

 ?>