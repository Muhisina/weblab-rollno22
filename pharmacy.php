<?php 
$conn= mysqli_connect('localhost', 'root', '', 'pharmacymanagement');
if (!$conn) {
	die('Connection error : ' . mysqli_connect_error());
}
$sql="select * from medicine";
$res= mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Management System</title>
	<style type="text/css">
		body {
			background-color: lightskyblue;
		}
		#form {
			background-color: mistyrose;
			padding: 20px;
		}
	</style>
	<script type="text/javascript">
		function validate() {
			if(document.form.medicine_code.value=="") {
				alert("Enter medicine code");
				return false;
			} 
			if(document.form.medicine_name.value=="") {
				alert("Enter medicine name");
				return false;
			} 
			if(document.form.quantity.value=="") {
				alert("Enter quantity");
				return false;
			} 
			if(document.form.unitprice.value=="") {
				alert("Enter unit price");
				return false;
			} 
			if(document.form.total_amount.value=="") {
				alert("Enter total amount");
				return false;
			} 
		}
	</script>
</head>
<body>
	<h1 style="text-align: center;margin-bottom: 50px;color: brown;"><u>Pharmacy Management System</u></h1>
	<div>
		<h2 style="text-align: center;">Add Medicine Details</h2>
		<form method="post" action="insert.php" name="form" onsubmit="return(validate())">
			<table cellpadding="5" cellspacing="5" align="center" id="form">
				<tr>
					<th>Medicine Code</th>
					<td><input type="text" name="medicine_code"></td>
				</tr>
				<tr>
					<th>Medicine Name</th>
					<td><input type="text" name="medicine_name"></td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td><input type="number" name="quantity"></td>
				</tr>
				<tr>
					<th>Unit Price</th>
					<td><input type="number" name="unitprice"></td>
				</tr>
				<tr>
					<th>Total Amount</th>
					<td><input type="number" name="total_amount"></td>
				</tr>
				<tr>
					<th colspan="2"><input type="submit" name="submit" value="Add" style="background-color: green;color: white;"></th>
				</tr>
			</table>
		</form>
	</div>
	<br><br><br>
	<div id="div2">
		<br><br>
		<h2 style="text-align: center;">Bill</h2>
		<table align="center" border="1">
			<tr>
				<th>Sl.No.</th>
				<th>Medicine Code</th>
				<th>Medicine Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total Amount</th>
			</tr>
			<?php
			$num=1;
			while($row=mysqli_fetch_assoc($res)) {
				?>
				<tr>
					<td><?php echo $num?></td>
					<td><?php echo $row['medicine_code']?></td>
					<td><?php echo $row['medicine_name']?></td>
					<td><?php echo $row['quantity']?></td>
					<td><?php echo $row['unitprice']?></td>
					<td style="font-size: 20px;"><?php echo $row['total_amount']?></td>
				</tr>
				<?php
				$num++;
			}
			?>
		</table>
		<br><br>
	</div>
</div>
</body>
</html>