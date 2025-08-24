<?php
include "db.php";

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $error = "Username already exists!";
    } else {
        $conn->query("INSERT INTO users (username,password,role) VALUES ('$username','$password','$role')");
        $success = "Account created! <a href='login.php'>Login here</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>
<h2>Sign Up</h2>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
<form method="POST">
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <select name="role" required>
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
    </select><br>
    <button type="submit" name="signup">Sign Up</button>
</form>
</body>
</html>
