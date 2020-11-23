<?php

//export.php

include('sms.php');

$shipment_system = new sms();

$file_name = md5(rand()) . '.csv';
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$file_name");
header("Content-Type: application/csv;");
$file = fopen("php://output", "w");
$header = array("Visitor ID", "Visitor Name", "Visitor Email", "Visitor Mobile No.", "Visitor Address", "Meet Person Department", "Meet Person Name", "Reason for Visit", "Enter Time", "Outing Remark", "Out Time", "Visitor Status", "Enter By");
fputcsv($file, $header);

if(isset($_GET["from_date"]) && isset($_GET["to_date"]))
{
	$shipment_system->query = "
	SELECT * FROM visitor_table 
	INNER JOIN admin_table 
	ON admin_table.admin_id = visitor_table.visitor_enter_by 
	WHERE DATE(visitor_table.visitor_enter_time) BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."' 
	";
	if(!$shipment_system->is_master_user())
	{
		$shipment_system->query .= ' AND visitor_table.visitor_enter_by = "'.$_SESSION["admin_id"].'" ';
	}

}
else
{
	$shipment_system->query = "
	SELECT * FROM visitor_table 
	INNER JOIN admin_table 
	ON admin_table.admin_id = visitor_table.visitor_enter_by 
	";
	if(!$shipment_system->is_master_user())
	{
		$shipment_system->query .= ' WHERE visitor_table.visitor_enter_by = "'.$_SESSION["admin_id"].'" ';
	}
}

$shipment_system->query .= 'ORDER BY visitor_table.visitor_id DESC';

$result = $shipment_system->get_result();

foreach($result as $row)
{
	$data = array();
	$data[] = $row["visitor_id"];
	$data[] = $row["visitor_name"];
	$data[] = $row["visitor_email"];
	$data[] = $row["visitor_mobile_no"];
	$data[] = $row["visitor_address"];
	$data[] = $row["visitor_department"];
	$data[] = $row["visitor_meet_person_name"];
	$data[] = $row["visitor_reason_to_meet"];
	$data[] = $row["visitor_enter_time"];
	$data[] = $row["visitor_outing_remark"];
	$data[] = $row["visitor_out_time"];
	$data[] = $row["visitor_status"];
	$data[] = $row["admin_name"];
	fputcsv($file, $data);
}
fclose($file);
exit;

?>