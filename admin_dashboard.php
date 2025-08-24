<?php
include "db.php";
if (!isset($_SESSION['user']) || $_SESSION['user']['role']!='admin') {
    header("Location: login.php"); exit();
}
?>
<h2>Admin Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user']['username']; ?>!</p>
<ul>
  <li><a href="admin_create_user.php">Create User Profile</a></li>
  <li><a href="admin_manage_users.php">Manage Users Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
