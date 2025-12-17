<?php
include 'db.php';
$prof_ssn = $_POST['prof_ssn'] ?? '';

$stmt = $conn->prepare("
  SELECT c.course_id, c.title, s.classroom, s.days, s.start_time, s.end_time
  FROM Section s
  JOIN Course c ON s.course_id = c.course_id
  WHERE s.prof_ssn = ?
  ORDER BY c.course_id, s.section_number
");
$stmt->bind_param("s", $prof_ssn);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Professor Classes</title></head>
<body>
  <h2>Classes for Professor SSN: <?php echo htmlspecialchars($prof_ssn); ?></h2>
  <p><a href="index.php">Back</a></p>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>Course</th><th>Title</th><th>Classroom</th><th>Days</th><th>Start</th><th>End</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['course_id']); ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['classroom']); ?></td>
        <td><?php echo htmlspecialchars($row['days']); ?></td>
        <td><?php echo htmlspecialchars($row['start_time']); ?></td>
        <td><?php echo htmlspecialchars($row['end_time']); ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
