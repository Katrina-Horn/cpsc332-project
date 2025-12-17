<?php
include 'db.php';
$course_num  = $_POST['course_num'] ?? '';
$section_num = intval($_POST['section_num'] ?? 0);

$stmt = $conn->prepare("
  SELECT e.grade, COUNT(*) AS count_grade
  FROM Enrollment e
  JOIN Section s ON e.section_id = s.section_id
  WHERE s.course_id = ? AND s.section_number = ?
  GROUP BY e.grade
  ORDER BY e.grade
");
$stmt->bind_param("si", $course_num, $section_num);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Grade Distribution</title></head>
<body>
  <h2>Grade Distribution: <?php echo htmlspecialchars($course_num); ?> Section <?php echo htmlspecialchars((string)$section_num); ?></h2>
  <p><a href="index.php">Back</a></p>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Grade</th><th>Count</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['grade']); ?></td>
        <td><?php echo htmlspecialchars($row['count_grade']); ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
