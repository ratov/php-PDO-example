<?php

function die_r($value) {
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	die();
}

require_once 'Database.php';

$db = new Database();

$getRow = $db->getRow("SELECT * FROM users WHERE id = ?", ["1"]);
$getRows = $db->getRows("SELECT * FROM users");
$insertRow = $db->insertRow("INSERT INTO users(username, password, email) VALUE (?, ?, ?)", ["Arthur", "134234ja", "ratov@mail.ru"]);
$updateRow = $db->updateRow("UPDATE users SET username = ?, password = ? WHERE id = ?", ["RatovKirill", "asd9321", "7"]);
$deleteRow = $db->deleteRow("DELETE FROM users WHERE id = ?", [8]);

die_r($deleteRow);