<?php

$xml = simplexml_load_file("weather.xml");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Weather XML</title>
</head>
<body>

<h2>Weather XML</h2>

<table border="1">

<tr>
    <th>City</th>
    <th>Temperature</th>
    <th>Humidity</th>
    <th>Wind</th>
</tr>

<tr>
    <td><?php echo $xml->city; ?></td>
    <td><?php echo $xml->temperature; ?> °C</td>
    <td><?php echo $xml->humidity; ?> %</td>
    <td><?php echo $xml->wind; ?> km/h</td>
</tr>

</table>

</body>
</html>