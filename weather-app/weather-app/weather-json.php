<?php

$json = file_get_contents(
'https://api.open-meteo.com/v1/forecast?latitude=45.81&longitude=15.98&current=temperature_2m,relative_humidity_2m,wind_speed_10m'
);

$data = json_decode($json, true);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Weather JSON</title>

<style>

table{
    border-collapse:collapse;
    width:600px;
}

th,td{
    border:1px solid black;
    padding:10px;
}

</style>

</head>
<body>

<h2>Weather Forecast (JSON)</h2>

<table>

<tr>
    <th>Temperature</th>
    <th>Humidity</th>
    <th>Wind Speed</th>
</tr>

<tr>
    <td>
        <?php echo $data['current']['temperature_2m']; ?> °C
    </td>

    <td>
        <?php echo $data['current']['relative_humidity_2m']; ?> %
    </td>

    <td>
        <?php echo $data['current']['wind_speed_10m']; ?> km/h
    </td>
</tr>

</table>

</body>
</html>