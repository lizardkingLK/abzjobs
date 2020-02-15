--============DATABASE CREATION=======================
CREATE DATABASE abcjobs
-- DROP DATABASE abcjobs

--===============TABLE CREATION=======================

CREATE TABLE category
(
	catId INT AUTO_INCREMENT,
	catName VARCHAR(20),

	CONSTRAINT pk_category
	PRIMARY KEY(catId)
);

CREATE TABLE subcategory (
	subCatId INT AUTO_INCREMENT UNIQUE,
	catId INT,
	subCatName VARCHAR(20),

	CONSTRAINT pk_subcategory
	PRIMARY KEY(catId,subCatId),

	CONSTRAINT fk_subcat_cat
	FOREIGN KEY(catId)
	REFERENCES category(catId)
);

CREATE TABLE vacancy
(
	vacancyId INT AUTO_INCREMENT,
	company VARCHAR(30),
	description VARCHAR(200),
	postDate DATETIME,
	expDate DATETIME,
	catId INT,
	subCatId INT,
	eId INT,
	
	CONSTRAINT pk_vacancy
	PRIMARY KEY(vacancyid),
	
	CONSTRAINT fk_vac_subcat
	FOREIGN KEY(catId,subcatId)
	REFERENCES subcategory(catId,subcatId)
);

CREATE TABLE employee (
	eId INT AUTO_INCREMENT,
	eName VARCHAR(20),
	password VARCHAR(120),
	status VARCHAR(10),
	type VARCHAR(50),

	CONSTRAINT pk_employee
	PRIMARY KEY(eId),

	CONSTRAINT ck_emp_status
	CHECK (status IN ('active','inactive'))
);

ALTER TABLE vacancy
add CONSTRAINT fk_vac_emp
FOREIGN KEY(eId)
REFERENCES employee(eId);

CREATE TABLE userlog (
	eId INT,
	logId INT AUTO_INCREMENT UNIQUE,
	ipAddress VARCHAR(100),
	loggedTime DATETIME,
	activity VARCHAR(50),

	CONSTRAINT pk_userlog
	PRIMARY KEY(eId,logId),

	CONSTRAINT fk_user_emp 
	FOREIGN KEY(eId)
	REFERENCES employee(eId)
);

--===temporary TABLEs====-----

CREATE TABLE presubcategory (
	presubcatId INT PRIMARY KEY NOT NULL,
	precatId INT,
	presubcatName VARCHAR(20)
)

--=========== Insert Queries ==================

INSERT INTO category (catName) VALUES ('Manager');
INSERT INTO category (catName) VALUES ('Lecturer');
INSERT INTO category (catName) VALUES ('Software Engineer');

INSERT INTO subcategory (catId, subCatName) VALUES (1,'HR Manager');
INSERT INTO subcategory (catId, subCatName) VALUES (1,'Marketing Manager');
INSERT INTO subcategory (catId, subCatName) VALUES (2,'Assistant Lecturer');
INSERT INTO subCategory (catId, subCatName) VALUES (2,'Senior Lecturer');
INSERT INTO subCategory (catId, subCatName) VALUES (3,'Associate SE');
INSERT INTO subCategory (catId, subCatName) VALUES (3,'Senior SE');

INSERT INTO employee (eName, password, status, type) VALUES ('Saman','123','active','manager');
INSERT INTO employee (eName, password, status, type) VALUES ('Nimal','123','active','director');
INSERT INTO employee (eName, password, status, type) VALUES ('Kamal','123','active','manager');

--------- vacancy TABLE ------------

INSERT INTO vacancy 
(company, description, postDate, expDate, catId, subCatId, eId)
VALUES
('IIT', 'empty', curdate(), '2018-12-31',3,5,3);

INSERT INTO vacancy 
(company, description, postDate, expDate, catId, subCatId, eId)
VALUES
('IIT', 'empty', '2018-11-12', '2018-12-31',2,4,1);

INSERT INTO vacancy 
(company, description, postDate, expDate, catId, subCatId, eId)
VALUES
('IIT', 'empty', now(), '2018-12-31',1,2,3);

--=============== SELECT QUERIES =============

-- most frequent category of a given date range----

SELECT * FROM vacancy

SELECT top 1 c.catName, count(vacancyId) AS vacancyCount
FROM vacancy v, category c
WHERE v.catId = c.catId AND 
		postDate > '2018-11-01' AND postDate < '2018-11-30'
GROUP BY v.catId , c.catName
ORDER BY vacancyCount DESC

-- Employee who posted most of the vacancies------

SELECT  top 1 e.eName, count(v.vacancyId) AS vCount
FROM vacancy v, employee e
WHERE v.eid = e.eid AND postDate > '2018-11-01' AND postDate < '2018-11-30'
GROUP BY v.eid, e.eName
ORDER BY vCount DESC

SELECT * FROM category
SELECT * FROM subCategory
SELECT * FROM employee
SELECT * FROM vacancy


-- most frequent category of a given date range----
-- SELECT * FROM vacancy
-- SELECT * FROM category

SELECT count(v.catId),c.catName
FROM vacancy v, category c
WHERE v.catId = c.catId AND postDate > '2018-11-01' AND postDate < '2019-01-01'
GROUP BY v.catId
HAVING count(v.catId)>1


/*
DROP TABLE userlog
DROP TABLE vacancy
DROP TABLE employee
DROP TABLE subcategory
DROP TABLE category
DROP TABLE presubcategory
DROP TABLE prevacancy
*/