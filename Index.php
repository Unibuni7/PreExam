<?php

if (!isset($_COOKIE['logged']))
    header("Location: Login.php");  //It redirects the user to your login page

?>






<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="layout.css">
    <script src="Sort.js"></script>

</head>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: Abdulmuaz alshaikhli
 * Date: 11-12-2017
 * Time: 16:52
 */

include ('Config.php');





?>

<h1> Order table </h1>
<table id="customTable">

    <tr id="tr1">

        <td onclick="sortTable(0)">   -Order_ID-    </td>
        <td onclick="sortTable(1)">   -Order_Date-  </td>
        <td onclick="sortTable(2)">   -Order_Desc-  </td>
        <td onclick="sortTable(3)">   -Order_Amount-</td>
        <td onclick="sortTable(4)">   -AGENT_NAME-  </td>
        <td onclick="sortTable(5)">   -CUST_NAME-   </td>

    </tr>

<?php


    // Choose content to acquire from specific table
    $sql = "SELECT orders.ORD_ID, orders.ORD_DATE, orders.ORD_DESCRIPTION, orders.ORD_AMOUNT, customers.CUST_NAME, agents.AGENT_NAME
 FROM ((orders
  INNER JOIN customers on orders.CUSTOMER_ID = customers.CUST_ID) 
  INNER JOIN agents on orders.AGENT_ID = agents.AGENT_ID)";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr id='tr2'>";

        echo "<td class='td1'>";
            echo $row[ORD_ID];
            echo "</td>";
        echo "<td class='td1'>";
            echo $row[ORD_DATE];
            echo "</td>";
        echo "<td class='td1'>";
            echo $row[ORD_DESCRIPTION];
            echo "</td>";
        echo "<td class='td1'>";
            echo $row[ORD_AMOUNT];
            echo "</td>";
        echo "<td class='td1'>";
            echo $row[AGENT_NAME];
            echo "</td>";
        echo "<td class='td1'>";
            echo $row[CUST_NAME];
            echo "</td>";
        echo "</tr>";
    }
    } else {
    echo "0 results";
    }
    ?>

</table>


</body>
</html>

