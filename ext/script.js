$(document).ready(function () {
    var url = "http://localhost:8888/PreExam/json_api.php/orders";

    $.get(url,function (data) {
        // parse JSON data
        var orderData = JSON.parse(data);
        // create a table with JSON
        var table = "<table class='table'>";
        table += "<thead>";
        table += "<tr>";
        table += "<th> -Order ID- </th>";
        table += "<th> -Date- </th>";
        table += "<th> -Description- </th>";
        table += "<th> -Amount- </th>";
        table += "</tr>";
        table += "</thead>";


        table += "<tbody>";

        for (var i = 0; i < orderData.length; i++){
            table += "<tr>";
            table += "<td>" + orderData[i].ORD_ID +"</td>";
            table += "<td>" + orderData[i].ORD_DATE +"</td>";
            table += "<td>" + orderData[i].ORD_DESCRIPTION + "</td>";
            table += "<td>" + orderData[i].ORD_AMOUNT + "</td>";
            table += "<tr>";

        }
        table += "</tbody>";
        table += "</table>";

        // append table to html DOM manipulation
        $("#table").append(table);

    });
    
});