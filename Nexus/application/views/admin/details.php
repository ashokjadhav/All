
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<style>
		table {
			text-align: center;
			font-size: 14px;
			font-family: verdana;
			background: #c0c0c0;
		}
 
		table thead tr,
		table tfoot tr {
			background: #c0c0c0;
		}
 
		table tbody tr {
			background: #f0f0f0;
		}
 
		td, th {
			border: 1px solid white;
		}
	</style>
</head>
 
<body>
<p>The book is available in the library now.. so click here to proceed to Hire</p>
<a href='<?php echo site_url('library');?>'>Hire Now</a> 
<table cellspacing="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Sub Category</th>
			<th>Publisher</th>
			<th>Price</th>
			<th>Date Added</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
//var_dump($info);
//exit;

if(isset($info)){
foreach($info as $res){
	
	?>
		<tr>
			<td><?php echo $res['name'];?></td>
			<td><?php echo $category;?></td>
			<td><?php echo $res['sub_category'];?></td>
			<td><?php echo $res['publisher'];?></td>
			<td><?php echo $res['price'];?></td>
			<td><?php echo $res['dop'];?></td>
			
		</tr>
		<?php } } ?>

	</tbody>
</table>
 
</body>
</html>