<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'gpsapp';

	$dsn = 'mysql:host='. $host .';dbname='. $dbname;

	$pdo = new PDO($dsn, $user, $password);

    $user = $_POST['username'];
    $password = $_POST['password'];

    $sqlcheck = 'SELECT * FROM login WHERE USERNAME = ?';

    $check = $pdo->prepare($sqlcheck);
    $check->execute(array($user));

    $result = $check->fetchAll();
    $count = count($result);

    if ($count == 0){
        $sqlinsert = 'INSERT INTO login(USERNAME, PASSWORD) VALUES (?, ?)';
        $insert = $pdo->prepare($sqlinsert);
        $insert->execute(array($user, $password));
        echo '<script>window.location.href = "success.html"; </script>';
    }
    else{
        echo '<script>window.location.href = "fail.html"; </script>';
    }
?>
