
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
<h2>TRAVEL REQUISITION</h2>
<!--<a href='<?php echo site_url('library');?>'>Hire Now</a>-->
<table cellspacing="1">
	<thead>
		<tr>
			<th>NAME OF PASSENGER</th>
			<th>DATE</th>
			<th>DESIGNATION</th>
			<th>DEPT.</th>
			<th>FROM</th>
			<th>TO</th>
			<th>DATE OF TRAVEL</th>
			<th>MODE</th>
			<th colspan='2'>PREFFERED TIME</th>
			<th>APPROVAL</th>
			<th>PNR</th>
         	<th>STATUS</th>
			<th>NAME OF APPROVING AUTHORITY</th>
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
			<td><?php echo $res['created_date'];?></td>
			<td><?php echo $res['designation']; ?></td>
			<td><?php echo $res['department']; ?></td>
			<td><?php echo $res['from'];?></td>
			<td><?php echo $res['to'];?></td>
			<td><?php echo $res['travel_date'];?></td>
			<td><?php echo $res['mode'];?></td>
			<td>FROM <?php echo $res['travel_time'];?></td>
			<td>TO <?php echo $res['travelt_time'];?></td>
			<td><?php if($res['approved_status']=='1'){echo "Approved";}elseif($res['approved_status']=='3' || $res['approved_status']=='0'){echo "Not Approved";}else{echo "Need  to Discuss";}?></td>
			<td><?php echo $res['PNR'];?></td>
                                                  <td><?php if($res['book_status']=='2'){echo "Booked";}elseif($res['book_status']=='1' ){echo "Cancelled";}?></td>
			<td><?php echo "Travel Desk Representative";?></td>
			<td><?php echo $res['instructions'];?></td>

		</tr>
		<?php } } ?>

	</tbody>
</table>
<?php if(isset($hotelrequestdetails)){?>
<h2>HOTEL REQUISTION</h2>
   <table cellspacing="1">
	<thead>
		<tr>
			<th>CODE NO.</th>
			<th>DATE OF CHECK IN</th>
			<th>DATE OF CHECK OUT</th>
			<th>PLACE OF STAY</th>
			<th>SPECIAL INSTRUCTIONS</th>


		</tr>
	</thead>
	<tbody>

		<?php foreach($hotelrequestdetails as $hotel){?>
         <tr><td><?php echo $hotel['ticket_number']; ?></td>
			<td><?php echo $hotel['checkin_date']; ?></td>
			<td><?php echo $hotel['checkout_date'];?></td>
			<td><?php echo $hotel['stayplace'];?></td>
			<td><?php echo $hotel['instructions'];?></td>
			</tr>
		<?php }?>

	</tbody>
	</table>
	<?php }?>
	<?php if(isset($guestrequestdetails)){?>
<h2>GUESTHOUSE REQUISTION</h2>
   <table cellspacing="1">
	<thead>
		<tr>
			<th>CODE NO.</th>
			<th>DATE OF CHECK IN</th>
			<th>DATE OF CHECK OUT</th>
			<th>PLACE OF STAY</th>
			<th>SPECIAL INSTRUCTIONS</th>


		</tr>
	</thead>
	<tbody>

		<?php foreach($guestrequestdetails as $guest){?>
         <tr><td><?php echo $guest['ticket_number']; ?></td>
			<td><?php echo $guest['checkin_date']; ?></td>
			<td><?php echo $guest['checkout_date'];?></td>
			<td><?php echo $guest['stayplace'];?></td>
			<td><?php echo $guest['instructions'];?></td>
			</tr>
		<?php }?>

	</tbody>
	</table>
	<?php }?>
</body>
</html>