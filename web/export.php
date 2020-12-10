<?php

//export.php

include('sms.php');

$shipment_system = new sms();

$file_name = md5(rand()) . '.csv';
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$file_name");
header("Content-Type: application/csv;");
$file = fopen("php://output", "w");
$header = array("SHIPMENT_NUM", "cus1", "cus2", "SHIPMENT_ESTIMATED_COST", "SHIPMENT_ACTUAL_COST", "SHIPMENT_SOURCE", "SHIPMENT_DESTINATION", "SHIPMENT_ORDER_DAY", "SHIPMENT_CONFIRMATION_PRIORITY", "SHIPMENT_STATUS", "SHIPMENT_START_DATE", "SHIPMENT_END_DATE", "SHIPMENT_END_DATE");
fputcsv($file, $header);

if(isset($_GET["from_date"]) && isset($_GET["to_date"]))
{
	$shipment_system->query = "
	SELECT *, t1.cus_fname cus1, t2.cus_fname  cus2
	FROM tgs_shipment
	JOIN tgs_customer t1 ON t1.cus_id = tgs_shipment.CUS_ID_SENDER 
	JOIN tgs_customer t2 ON t2.cus_id = tgs_shipment.CUS_ID_RECEIVER 
	WHERE tgs_shipment.SHIPMENT_STATUS = 'Pending'
	AND DATE(visitor_table.visitor_enter_time) BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."' 
	";
	

}
else
{
	$shipment_system->query = "
	SELECT *, t1.cus_fname cus1, t2.cus_fname  cus2
	FROM tgs_shipment
	JOIN tgs_customer t1 ON t1.cus_id = tgs_shipment.CUS_ID_SENDER 
	JOIN tgs_customer t2 ON t2.cus_id = tgs_shipment.CUS_ID_RECEIVER 
	WHERE tgs_shipment.SHIPMENT_STATUS = 'Pending' 
	";

}

$shipment_system->query .= 'ORDER BY tgs_shipment.SHIPMENT_NUM ASC';

$result = $shipment_system->get_result();

foreach($result as $row)
{
	$data = array();
	$data[] = $row["SHIPMENT_NUM"];
	$data[] = $row["cus1"];
	$data[] = $row["cus2"];
	$data[] = $row["SHIPMENT_ESTIMATED_COST"];
	$data[] = $row["SHIPMENT_ACTUAL_COST"];
	$data[] = $row["SHIPMENT_SOURCE"];
	$data[] = $row["SHIPMENT_DESTINATION"];
	$data[] = $row["SHIPMENT_ORDER_DAY"];
	$data[] = $row["SHIPMENT_CONFIRMATION_PRIORITY"];
	$data[] = $row["SHIPMENT_STATUS"];
	$data[] = $row["SHIPMENT_START_DATE"];
	$data[] = $row["SHIPMENT_END_DATE"];
	$data[] = $row["SHIPMENT_END_DATE"];
	fputcsv($file, $data);
}
fclose($file);
exit;

?>