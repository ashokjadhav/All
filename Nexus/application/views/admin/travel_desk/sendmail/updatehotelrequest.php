
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<style>
		table {
			text-align: center;
			font-size: 14px;
			font-family: 'Pacifico', cursive;
			background: #F2CF66;
		}

		table thead tr,
		table tfoot tr {
			background: #F2CF66;
		}

		table tbody tr {
			background: #F2CF66;
		}

		td, th {
			border:1px solid black;
			border-radius: 7px;
			font-family: 'Pacifico', cursive;
		}
	</style>
</head>

<body>
<?php if($table=='book_hotel'){?>
<h2>HOTEL BOOKING</h2><?php } elseif($table=='book_guesthouse'){?>
<h2>GUESTHOUSE BOOKING</h2><?php }?>
<!--<a href='<?php echo site_url('library');?>'>Hire Now</a>-->
<table cellspacing="1">
	<thead>
		<tr>
			<th>NAME OF PASSENGER</th>
			<th>DESIGNATION</th>
<!--			<th>CODE NO.</th>-->
			<th>DATE OF CHECK IN</th>
			<th>DATE OF CHECK OUT</th>
			<th>PLACE OF STAY</th>
			<th>SPECIAL INSTRUCTIONS</th>


		</tr>
	</thead>
	<tbody>
	<?php

if(isset($requestdetails)){
foreach($requestdetails as $res){
	?>
		<tr>
			<td><?php echo $res['name'];?></td>
			<td><?php echo $res['designation'];?></td>
<!--			<td><?php //echo $res['ticket_number']; ?></td>-->
			<td><?php echo $res['checkin_date']; ?></td>
			<td><?php echo $res['checkout_date'];?></td>
			<td><?php echo $res['stayplace'];?></td>
			<td><?php echo $res['instructions'];?></td>


		</tr>
		<?php } } ?>

	</tbody>
</table>

</body>
</html>