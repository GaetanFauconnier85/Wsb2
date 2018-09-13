<?php

$pdo = new PDO('mysql:dbname=wsb2; host=localhost', 'root', 'p@ssw0rd');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);