<?php
$conn = mysqli_connect("localhost","root","root","db_emidukaan");


$filename = "toy_csv.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='db_emidukaan' AND TABLE_NAME='db_virtuemart_fastbanking_orders'";
$result = mysql_query($query);
while ($row = mysql_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$query = "SELECT 'User_id,Marchand_order_Id,Product_Name,Sku,Product_DiscountAmount,Product_Quantity,Product_TotalAmount,created_on,Fastbanking_order_status,Fastbaking_Trans_amount' FROM db_virtuemart_fastbanking_orders where Marchand_order_Id != ''  ORDER BY created_on DESC";
$result = mysql_query($query);
while($row = mysql_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>
