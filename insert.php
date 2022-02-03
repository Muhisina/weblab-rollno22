<?php
$conn= mysqli_connect('localhost', 'root', '', 'pharmacymanagement');
if (!$conn) {
	die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['submit'])) {
	$sql="insert into medicine(medicine_code,medicine_name,quantity,unitprice,total_amount) values ('$_POST[medicine_code]','$_POST[medicine_name]',$_POST[quantity],$_POST[unitprice],$_POST[total_amount])";
	$res= mysqli_query($conn, $sql);
	if($res) {
		echo "<script>alert('Medicine Added')</script>";
		echo "<script>window.location.replace('pharmacy.php')</script>";    
	}    
}
?>