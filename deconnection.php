<?php
session_start();
require_once 'db.php';

$_SESSION = array();
session_destroy();

header('location: index.php');