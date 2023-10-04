<?php
session_start();
require_once 'conn/Database.php';

if (isset($_POST["reply"])) {
    $topic_id = $_POST["topic_id"];
    $reply = $_POST["reply"];
    $user_id = $_SESSION['user_id'];
    $currentTimestamp = date('Y-m-d H:i:s'); 
    try {
        $stmt = $pdo->prepare("INSERT INTO replies (user_id, body, create_date, topic_id) VALUES (:user_id, :reply, :currentTimestamp, :topic_id)");
        $stmt->bindParam(':topic_id', $topic_id, PDO::PARAM_INT); 
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
        $stmt->bindParam(':reply', $reply, PDO::PARAM_STR);
        $stmt->bindParam(':currentTimestamp', $currentTimestamp, PDO::PARAM_STR); 
        $stmt->execute();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
