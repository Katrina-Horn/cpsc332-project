<?php
include 'db.php';
$course_num = $_POST['course_num'] ?? '';

$stmt = $conn->prepare("
  SELECT s.section_number, s.classroom, s.days, s.start_time, s.end_time,
         COUNT(e.cwid) AS enrolled
  FROM Section s
  LEFT JOIN Enrollment e ON s.section_id = e.section_id
  WHERE s.course_id = ?
  GROUP BY s.section_id, s.section_number, s.classroom, s.days, s.start_time, s.end_time
  ORDER BY s.section_number
");
$stmt->bind_param("s", $course_num);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Course Sections</title></head>
<body>
  <h2>Sections for Course: <?php echo htmlspecialchars($course_num); ?></h2>
  <p><a href="index.php">Back</a></p>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>Section</th><th>Classroom</th><th>Days</th><th>Start</th><th>End</th><th>Enrolled</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['section_number']); ?></td>
        <td><?php echo htmlspecialchars($row['classroom']); ?></td>
        <td><?php echo htmlspecialchars($row['days']); ?></td>
        <td><?php echo htmlspecialchars($row['start_time']); ?></td>
        <td><?php echo htmlspecialchars($row['end_time']); ?></td>
        <td><?php echo htmlspecialchars($row['enrolled']); ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
