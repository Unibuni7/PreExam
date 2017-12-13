<?php
/**
 * Created by PhpStorm.
 * User: slmns
 * Date: 13-12-2017
 * Time: 14:05
 */

header("Access-Control-Allow-Origin: *");


// get the HTTP method, path and body of the request

$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));



include ('Config.php');





// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request);

// create sql statement
if ($table == orders)  {
    $sql = "SELECT * from `$table`".($key ? "WHERE ORD_ID = $key" : '');
} elseif ($table == customers) {
    $sql = "SELECT * from `$table`".($key ? "WHERE CUST_ID = $key" : '');
} elseif ($table == agents) {
    $sql = "SELECT * from `$table`".($key ? "WHERE AGENT_ID = $key" : '');
}

// execute

// excecute SQL statement
$result = $conn->query($sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die($conn->error);
}

// encode resultset to json
if (!$key) echo '[';
while ($row = $result->fetch_assoc()) {
    echo ($count > 0 ? ',' : ''). json_encode($row);
    $count++;
}
if (!$key) echo "]";




// close mysql connection
$conn->close();



?>


