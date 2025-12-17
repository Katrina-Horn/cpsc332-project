<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>University Database Interface</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    h1 { text-align: center; }
    .box { border: 1px solid #ccc; padding: 16px; border-radius: 8px; margin-bottom: 16px; }
    label { display: inline-block; width: 240px; margin-right: 8px; }
    input { padding: 6px; width: 240px; }
    button { padding: 6px 12px; }
  </style>
</head>
<body>

<h1>Interface for Database</h1>

<div class="box">
  <h2>For Professors</h2>

  <form action="professor_classes.php" method="post">
    <p>
      <label for="prof_ssn">Professor SSN:</label>
      <input type="text" id="prof_ssn" name="prof_ssn" required>
      <button type="submit">Search</button>
    </p>
  </form>

  <form action="grade_distribution.php" method="post">
    <p>
      <label for="prof_course">Course Number:</label>
      <input type="text" id="prof_course" name="course_num" required>
    </p>
    <p>
      <label for="prof_section">Section Number:</label>
      <input type="number" id="prof_section" name="section_num" required>
      <button type="submit">Search</button>
    </p>
  </form>
</div>

<div class="box">
  <h2>For Students</h2>

  <form action="course_sections.php" method="post">
    <p>
      <label for="student_course">Course Number:</label>
      <input type="text" id="student_course" name="course_num" required>
      <button type="submit">Search</button>
    </p>
  </form>

  <form action="student_transcript.php" method="post">
    <p>
      <label for="cwid">Campus Wide ID (CWID):</label>
      <input type="text" id="cwid" name="cwid" required>
      <button type="submit">Search</button>
    </p>
  </form>
</div>

</body>
</html>
