<?php
include "db.php";
if (!isset($_SESSION['user']) || $_SESSION['user']['role']!='student') {
    header("Location: login.php"); exit();
}
$quizzes = $conn->query("SELECT * FROM quizzes");
?>
<h2>Student to Student Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['user']['username']; ?>!</p>
<ul>
<?php while($q=$quizzes->fetch_assoc()): ?>
    <li>
        <?php echo $q['title']; ?> 
        <a href="take_quiz.php?id=<?php echo $q['id']; ?>">Start Quiz</a>
    </li>
<?php endwhile; ?>
</ul>
<a href="logout.php">Logout</a>
