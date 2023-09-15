<?php
session_start();
require_once 'conn/Database.php';

if (isset($_POST["content"]) && isset($_SESSION['user_id'])) {
    $content = $_POST["content"];
    $user_id = $_SESSION['user_id'];
    $currentTimestamp = date('Y-m-d H:i:s'); 

    try {
        $stmt = $pdo->prepare("INSERT INTO topics (user_id, body, create_date) VALUES (:user_id, :content, :currentTimestamp)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':currentTimestamp', $currentTimestamp, PDO::PARAM_STR); 
        $stmt->execute();
        header("Location: dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
