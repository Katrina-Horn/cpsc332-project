INSERT INTO Professor VALUES
('617384920','Dr. June Byte','404 NotFound Ave','Brea','CA','92821','714','5550199','F','Professor',132500.00,'PhD Computer Science'),
('503118772','Dr. Omar Queue','7 FakeRoad Rd','Fullerton','CA','92831','657','5552048','M','Associate Professor',118250.00,'PhD Mathematics'),
('281009334','Dr. Priya Hash','12 Recursion Ct','Placentia','CA','92870','714','5553141','F','Assistant Professor',104750.00,'MS Computer Science');

INSERT INTO Department VALUES
(10,'Computer Science','657-555-0133','CS-201','617384920'),
(20,'Mathematics','714-555-0202','MH-120','503118772');

INSERT INTO Course VALUES
('CPSC120','Intro to Programming','Starting Out with C++',3,10),
('CPSC332','File Structures & DB Systems','Database Systems Concepts',3,10),
('MATH150A','Calculus I','Stewart Calculus',4,20),
('MATH338','Discrete Math','Discrete Mathematics and Its Applications',3,20);

INSERT INTO Prerequisite VALUES
('CPSC332','CPSC120'),
('MATH338','MATH150A');

INSERT INTO Section VALUES
(1,'CPSC120',1,'CS-101',28,'MW','09:00:00','10:15:00','281009334'),
(2,'CPSC120',2,'CS-102',30,'TR','11:00:00','12:15:00','281009334'),
(3,'CPSC332',1,'CS-301',24,'MW','10:30:00','11:45:00','617384920'),
(4,'CPSC332',2,'CS-302',22,'TR','14:00:00','15:15:00','617384920'),
(5,'MATH150A',1,'MH-210',36,'MWF','08:00:00','08:50:00','503118772'),
(6,'MATH338',1,'MH-220',34,'TR','09:30:00','10:45:00','503118772');

INSERT INTO Student VALUES
('900120001','Riley','Smith','8 Caffeine Loop','Fullerton','CA','92831','714','5551111',10),
('900120002','Sam','Parker','42 EnergyDrink Dr','Anaheim','CA','92805','714','5552222',10),
('900120003','Jules','Martinez','3 RubberDucky Ln','Brea','CA','92821','657','5553333',10),
('900120004','Taylor','Singh','99 GroupProject Way','Placentia','CA','92870','714','5554444',20),
('900120005','Casey','Kim','1 ExtraCredit Ct','Fullerton','CA','92831','657','5555555',20),
('900120006','Morgan','Lopez','77 Submit Blvd','Buena Park','CA','90620','714','5556666',10),
('900120007','Jordan','Chen','5 OfficeHours Ave','Fullerton','CA','92831','657','5557777',20),
('900120008','Avery','Garcia','10 VeryTired St','Brea','CA','92821','714','5558888',10);

INSERT INTO Minor VALUES
('900120001',20),
('900120004',10),
('900120007',10);

INSERT INTO Enrollment VALUES
('900120001',1,'A'),
('900120002',1,'B+'),
('900120003',1,'A-'),
('900120006',1,'B'),
('900120008',1,'A'),

('900120001',3,'A-'),
('900120002',3,'B'),
('900120003',3,'B+'),
('900120006',3,'A'),
('900120008',3,'C+'),

('900120001',4,'A'),
('900120002',4,'A-'),
('900120006',4,'B+'),

('900120004',5,'B-'),
('900120005',5,'A'),
('900120007',5,'C'),

('900120004',6,'A-'),
('900120005',6,'B+'),
('900120007',6,'B'),
('900120003',6,'A');
