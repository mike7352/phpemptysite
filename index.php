<?php
error_reporting(E_ALL);
// PHP Data Objects(PDO) Sample Code:
$server ="amcc20.database.windows.net:1433";
$user = "mike7352@amcc20";
$pass = "Bigpicture1";


try {
$conn = new PDO("sqlsrv:server = tcp:amcc20.database.windows.net,1433; Database = Access 2.0", "mike7352", $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Error connecting to SQL Server.");
die(print_r($e));
}
// $conn=odbc_connect($server,$user,$pass);
// if (!$conn){
    // if (phpversion() < '4.0'){
      // exit("Connection Failed: . $php_errormsg" );
    // }
    // else{
      // exit("Connection Failed:" . odbc_errormsg() );
    // }
// }

  // $link = mssql_connect($server, $user, $pass) or die('ddd');

// if (!$link) {
   // die('Not connected : '  ); 
// }
 
 // $connectOptions = array("Database" => " Access 2.0");  
// $db_selected = mssql_select_db($connectOptions	, $link);
// if (!$db_selected) {
	// die ('Cant use db : '. mssql_get_last_message() );
// } 
// exit;
#
#Driver={ODBC Driver 13 for SQL Server};Server=tcp:amcc20.database.windows.net,1433;Database=Access 2.0;Uid=mike7352@amcc20;Pwd={your_password_here};Encrypt=yes;TrustServerCertificate=no;Connection Timeout=30;



ini_set("display_errors", 1);
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

$new_record = json_decode($_POST['record'],true);

//echo "PHP Version: ".phpversion();
//$link = mssql_connect('amcc20.database.windows.net:1433','mike7352@amcc20','Bigpicture1');
//if (!$link) {
//    die('Something went wrong while connecting to MSSQL');
//}else{
//    die('Hello');
//}
//$serverName = "amcc20.database.windows.net";
//$con = sqlsrv_connect($serverName,['amcc20.database.windows.net','mike7352','Bigpicture1'])
//or die('Could not connect to the server!');
//try {
//    $conn = new PDO("sqlsrv:server=tcp:amcc20.database.windows.net:1433;Database=Access 2.0", "mike7352@amcc20", "Bigpicture1");
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}
//catch (PDOException $e) {
//    print("Error connecting to SQL Server.");
//    die(print_r($e));
//}


//echo json_encode('hello');
//exit;
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "mike7352@amcc20", "pwd" => "Bigpicture1", "Database" => "Access 2.0", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:amcc20.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
if (!$conn) {
    var_dump(sqlsrv_errors());
}
//echo json_encode('hello');
//exit;
//$link = mssql_connect('https://amcc20.database.windows.net', 'mike7352', 'Bigpicture1', true);
//
//if (!$link) {
//    die('Something went wrong while connecting to MSSQL');
//}

$job_number = $new_record['field_1'];
$day = $new_record['field_2'];
$date = $new_record['field_3'];
$type = $new_record['field_4'];
$event_title = $new_record['field_5'];
$band = $new_record['field_6'];
$venue_address = $new_record['field_7'];
$event_start_time = $new_record['field_8'];
$booked_until = $new_record['field_9'];
$venue_location = $new_record['field_10'];
$planning_meeting_date = $new_record['field_11'];
$planning_meeting_info = $new_record['field_12'];
$continuous_status = $new_record['field_13'];
$notes = $new_record['field_14'];
$repeat = $new_record['field_15'];


//$job_number = '99999995';
//$day = 'field_2';
//$date = '2004-10-01 00:00:00';
//$type = 'field_4';
//$event_title = 'field_5';
//$band = 'field_6';
//$venue_address = 'field_7';
//$event_start_time = '2004-10-01 00:00:00';
//$booked_until = '2004-10-01 00:00:00';
//$venue_location = 'field_10';
//$planning_meeting_date = '2004-10-01 00:00:00';
//$planning_meeting_info = 'field_12';
//$continuous_status = 'field_13';
//$notes = 'field_14';
//$repeat = 0;

// Select a database:
//mssql_select_db('A')
//or die('Could not select a database.');

// Example query: (TOP 10 equal LIMIT 0,10 in MySQL)
$SQL =  "INSERT INTO EVENT  
( 
    job_number, day, date, type, event_title, band, 
    venue_address, event_start_time, booked_until, venue_location,
    planning_meeting_date, planning_meeting_info , continuous_status, notes,
    repeat
) 
VALUES 
(
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?,
   ?
   
)";

$params = [
    $job_number,
    $day,
    $date,
    $type,
    $event_title,
    $band,
    $venue_address,
    $event_start_time,
    $booked_until,
    $venue_location ,
    $planning_meeting_date ,
    $planning_meeting_info ,
    $continuous_status ,
    $notes,
    $repeat
];
// Execute query:
$result = sqlsrv_query($conn, $SQL, $params)
or var_dump(sqlsrv_errors());
//var_dump($result);
//// Get result count:
//$Count = mssql_num_rows($result);
//print "Showing $count rows:<hr/>\n\n";
//
//// Fetch rows:
//while ($Row = mssql_fetch_assoc($result)) {
//
//    print $Row['Fieldname'] . "\n";
//
//}

sqlsrv_close($conn);



echo json_encode($job_number);
