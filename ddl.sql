DROP TABLE IF EXISTS Enrollment;
DROP TABLE IF EXISTS Minor;
DROP TABLE IF EXISTS Prerequisite;
DROP TABLE IF EXISTS Section;
DROP TABLE IF EXISTS Student;
DROP TABLE IF EXISTS Course;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Professor;

CREATE TABLE Professor (
  ssn CHAR(9) PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  street VARCHAR(60),
  city VARCHAR(40),
  state CHAR(2),
  zip CHAR(5),
  area_code CHAR(3),
  phone_number CHAR(7),
  sex CHAR(1),
  title VARCHAR(40),
  salary DECIMAL(10,2),
  degree VARCHAR(60)
);

CREATE TABLE Department (
  dept_id INT PRIMARY KEY,
  name VARCHAR(60) NOT NULL,
  phone VARCHAR(12),
  office VARCHAR(30),
  chair_ssn CHAR(9) NOT NULL,
  FOREIGN KEY (chair_ssn) REFERENCES Professor(ssn)
);

CREATE TABLE Course (
  course_id VARCHAR(10) PRIMARY KEY,
  title VARCHAR(80) NOT NULL,
  textbook VARCHAR(80),
  units INT NOT NULL,
  dept_id INT NOT NULL,
  FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
);

CREATE TABLE Prerequisite (
  course_id VARCHAR(10) NOT NULL,
  prereq_id VARCHAR(10) NOT NULL,
  PRIMARY KEY (course_id, prereq_id),
  FOREIGN KEY (course_id) REFERENCES Course(course_id),
  FOREIGN KEY (prereq_id) REFERENCES Course(course_id)
);

CREATE TABLE Section (
  section_id INT PRIMARY KEY,
  course_id VARCHAR(10) NOT NULL,
  section_number INT NOT NULL,
  classroom VARCHAR(30),
  seats INT,
  days VARCHAR(10),
  start_time TIME,
  end_time TIME,
  prof_ssn CHAR(9) NOT NULL,
  FOREIGN KEY (course_id) REFERENCES Course(course_id),
  FOREIGN KEY (prof_ssn) REFERENCES Professor(ssn)
);

CREATE TABLE Student (
  cwid CHAR(9) PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  street VARCHAR(60),
  city VARCHAR(40),
  state CHAR(2),
  zip CHAR(5),
  area_code CHAR(3),
  phone_number CHAR(7),
  major_dept INT NOT NULL,
  FOREIGN KEY (major_dept) REFERENCES Department(dept_id)
);

CREATE TABLE Minor (
  cwid CHAR(9) NOT NULL,
  dept_id INT NOT NULL,
  PRIMARY KEY (cwid, dept_id),
  FOREIGN KEY (cwid) REFERENCES Student(cwid),
  FOREIGN KEY (dept_id) REFERENCES Department(dept_id)
);

CREATE TABLE Enrollment (
  cwid CHAR(9) NOT NULL,
  section_id INT NOT NULL,
  grade VARCHAR(2) NOT NULL,
  PRIMARY KEY (cwid, section_id),
  FOREIGN KEY (cwid) REFERENCES Student(cwid),
  FOREIGN KEY (section_id) REFERENCES Section(section_id)
);
