<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    try {
        $sql = "SELECT id, username, password FROM users WHERE username = :username OR email = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['logged_in'] = true;
                    
                    // Immediate redirect
                    header("Location: home.php");
                    exit();
                }
            }
        }
    } catch (PDOException $e) {
        // Log error but don't show to user
        error_log("Login error: " . $e->getMessage());
    }
    
    // If we get here, login failed
    header("Location: index.html?error=1");
    exit();
}
?>