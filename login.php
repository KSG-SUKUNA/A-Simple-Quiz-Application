<?php
include "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $result->fetch_assoc();
        $role = $_SESSION['user']['role'];

        if ($role == 'admin') header("Location: admin_dashboard.php");
        elseif ($role == 'faculty') header("Location: faculty_dashboard.php");
        else header("Location: student_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login Page</title></head>
<body>
<h2>Login</h2>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
</form>
<p>Don’t have an account? <a href="signup.php">Sign up</a></p>
</body>
</html>
