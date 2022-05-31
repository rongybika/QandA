<?php

$pageTitle = 'Contact - SubAns';

$database = new Database();
$db = $database->getConnection();

$queryInsert = "INSERT INTO contacts (fname, lname, email, details) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($queryInsert);
$stmt->bindParam(1, $_POST['fname']);
$stmt->bindParam(2, $_POST['lname']);
$stmt->bindParam(3, $_POST['email']);
$stmt->bindParam(4, $_POST['details']);
$stmt->execute();
$num = $stmt->rowCount();

if ($num > 0) {
    $errorMessage = "Message submitted.";
    require_once  __DIR__ . '/../../templates/contact-submit.html.php';
} else {
    $errorMessage = "Error happened. Please try again.";
    require_once  __DIR__ . '/../../templates/contact.html.php';
}
