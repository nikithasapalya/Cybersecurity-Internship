<?php
session_start();

// 1. Generate a token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 2. Validate token on form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token mismatch — request rejected');
    }
    // Proceed with password change...
}
?>

<!-- 3. Embed the token in the HTML form -->
<form action="" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="password" name="password_new">
    <input type="submit" value="Change Password">
</form>
