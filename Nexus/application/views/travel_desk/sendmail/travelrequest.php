<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<style>
		table {
			text-align: center;
			font-size: 8px;
			font-family: 'Calibri', cursive;
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
			font-family: 'Calibri', cursive;
		}
	</style>
</head>
<body>
<h2>TRAVEL REQUISITION</h2>
<table cellspacing="1">
	<thead>
		<tr>
			<th>NAME OF PASSENGER</th>
			<th>REQUEST DATE</th>
			<th>DESIGNATION</th>
			<th>DEPT.</th>
			<th>FROM</th>
			<th>TO</th>
			<th>DATE OF TRAVEL</th>
			<th colspan='2'>PREFFERED TIME</th>
			<th>RETURN DATE</th>
			<th colspan='2'>RETURN PREFFERED TIME</th>
			<th>MODE</th>
			<th>STATUS</th>
			<th>NAME OF APPROVING AUTHORITY</th>
			<th>PURPOSE OF TRAVEL</th>
		</tr>
	</thead>
	<tbody>
	<?php
//var_dump($body);
//exit;

if(isset($body)){
	foreach($body as $res){

	?>
		<tr>
			<td><?php echo $res['name'];?></td>
			<td><?php echo date('d M Y',strtotime($res['created_date']));?></td>
			<td><?php echo $res['designation']; ?></td>
			<td><?php echo $res['department']; ?></td>
			<td><?php echo $res['from'];?></td>
			<td><?php echo $res['to'];?></td>
			<td><?php echo date('d M Y',strtotime($res['travel_date']));?></td>
			<td>FROM <?php echo $res['travel_time'];?></td>
			<td>TO <?php echo $res['travelt_time'];?></td>
			<td><?php echo date('d M Y',strtotime($res['return_date']));?></td>
			<td>FROM <?php echo $res['Rtrn_travel_time'];?></td>
			<td>TO <?php echo $res['Rtrn_travelt_time'];?></td>
			<td><?php echo $res['mode'];?></td>
			<td><?php if($res['approved_status']=='0'){echo "Not Approved";}?></td>
			<td><?php echo $res['authorityname'];?></td>
			<td><?php echo $res['purpose'];?></td>

		</tr>
		<?php } } ?>

	</tbody>
</table>
<?php if(isset($hotel)){ ?>
<h2>HOTEL BOOKING</h2>
<table cellspacing="1">
	<thead>
		<tr>
            <th>LOCATION</th>
            <th>CHECK IN DATE</th>
            <th>CHECK OUT DATE</th>
            <th>SPECIAL INSTRUCTIONS</th>
		</tr>
	</thead>
	<tbody>
	<?php


	foreach($hotel as $res1){

	?>
		<tr>
			<td><?php echo $res1['stayplace'];?></td>
			<td><?php echo date('d M Y',strtotime($res1['checkin_date'])); ?></td>
			<td><?php echo date('d M Y',strtotime($res1['checkout_date'])); ?></td>
			<td><?php echo $res1['instructions']; ?></td>

		</tr>
		<?php }  ?>

	</tbody>
</table>
<?php }?>
<?php if(isset($guesthouse)){?>
<h2>GUESTHOUSE BOOKING</h2>
<table cellspacing="1">
	<thead>
		<tr>
			<th>LOCATION</th>
			<th>CHECK IN DATE</th>
			<th>CHECK OUT DATE</th>
			<th>SPECIAL INSTRUCTIONS</th>
		</tr>
	</thead>
	<tbody>
	<?php


	foreach($guesthouse as $res2){

	?>
		<tr>
			<td><?php echo $res2['stayplace'];?></td>
			<td><?php echo date('d M Y',strtotime($res2['checkin_date'])); ?></td>
			<td><?php echo date('d M Y',strtotime($res2['checkout_date'])); ?></td>
			<td><?php echo $res2['instructions']; ?></td>

		</tr>
		<?php }  ?>

	</tbody>
</table>
<?php }?>
</body>
</html>