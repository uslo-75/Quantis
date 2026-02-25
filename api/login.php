<?php
session_start();
require __DIR__ . "/db.php";

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if (!$email || !$password) {
    exit("Champs manquants");
}

$stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user["password_hash"])) {
    exit("Identifiants incorrects");
}

$_SESSION["user_id"] = $user["id"];

header("Location: /Quantis/pages/Dashboard.php");
exit;
