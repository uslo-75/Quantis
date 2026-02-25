<?php
require __DIR__ . "/db.php";

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if (!$email || !$password) {
    exit("Champs manquants");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Email invalide");
}

if (strlen($password) < 6) {
    exit("Mot de passe trop court");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");

try {
    $stmt->execute([$email, $hash]);
} catch (PDOException $e) {
    exit("Email déjà utilisé");
}

header("Location: /Quantis/pages/login.php");
exit;
