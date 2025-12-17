<?php
include 'db.php';
$cwid = $_POST['cwid'] ?? '';

$stmt = $conn->prepare("
  SELECT c.course_id, c.title, s.section_number, e.grade
  FROM Enrollment e
  JOIN Section s ON e.section_id = s.section_id
  JOIN Course c ON s.course_id = c.course_id
  WHERE e.cwid = ?
  ORDER BY c.course_id, s.section_number
");
$stmt->bind_param("s", $cwid);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Student Transcript</title></head>
<body>
  <h2>Transcript for Student CWID: <?php echo htmlspecialchars($cwid); ?></h2>
  <p><a href="index.php">Back</a></p>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Course</th><th>Title</th><th>Section</th><th>Grade</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['course_id']); ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['section_number']); ?></td>
        <td><?php echo htmlspecialchars($row['grade']); ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
