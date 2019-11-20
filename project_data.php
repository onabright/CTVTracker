<?php
$sql_query = "SELECT * FROM licensed_projects ORDER BY year_licensed DESC ";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$data_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$data_records[] = $rows;
}
?>