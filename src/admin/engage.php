
<?

    require_once('include/dbconnector.php');

    $connector = new DbConnector(ELECTIONS);
    $connector->query('UPDATE `elections` SET `open` = 1;');
    $connector->close();

?>

<html>

<head>
<title>Election activation</title>
</head>

<body>
The election has begun.
</body>

</html>