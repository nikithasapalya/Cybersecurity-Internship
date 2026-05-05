<?php
// SECURE CODE: Using Prepared Statements (PDO)
// This separates the SQL query structure from the data.

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=dvwa', 'dvwa', 'p@ssw0rd');
    
    // 1. Prepare the query with a placeholder (?)
    $stmt = $pdo->prepare('SELECT first_name, last_name FROM users WHERE user_id = ?');
    
    // 2. Execute and pass the user input as an array
    $stmt->execute([$id]);
    
    $result = $stmt->fetchAll();
    
    foreach($result as $row) {
        echo "First Name: " . $row['first_name'] . " Last Name: " . $row['last_name'];
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
