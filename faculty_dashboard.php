<?php
include "db.php";
if (!isset($_SESSION['user']) || $_SESSION['user']['role']!='faculty') {
    header("Location: login.php"); exit();
}
?>
<h2>Faculty Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user']['username']; ?>!</p>
<ul>
  <li><a href="create_quiz.php">Create Quiz</a></li>
  <li><a href="view_results.php">View Results</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
