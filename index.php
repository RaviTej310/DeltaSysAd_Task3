<html>
<head></head>
<body>

<br>
<?php
if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}
$connection = @mysql_connect('localhost', 'root', '') or die (mysql_error());
@mysql_select_db('ip_addresses1', $connection) or die (mysql_error());

$query = @mysql_query("INSERT INTO ip_address1 (ip_address1) VALUES ('$ip_address')");

@mysql_connect('localhost','root','');
@mysql_select_db(ip_addresses1);
$sql='SELECT * FROM ip_address1';
$records=mysql_query($sql);
$hits=mysql_num_rows($records);
echo "Number of hits=",$hits;
?>

<br><br>List of IP addresses which have visited this site:-<br><br>

<?php

while($ip=mysql_fetch_assoc($records)) {

	  echo $ip['ip_address1'];
	  echo "<br>";

}

?>

</body>
</html>