CREATE DATABASE alma1;


USE alma1;
CREATE TABLE cars (
    cid INT AUTO_INCREMENT,
    cname VARCHAR(50) NOT NULL,
    model INT NOT NULL,
    color VARCHAR(20) NOT NULL,
 vn VARCHAR (17)NOT NULL,
    price INT,
   damg VARCHAR(500),
   prk VARCHAR(6);
   
    PRIMARY KEY (cid)
);
USE alma1;

CREATE TABLE   user 
 ( 
  name  VARCHAR(25) NOT NULL,
  un  CHAR(10) primary key ,
  pass  char(50) NOT NULL,
  phone  int (8) NOT NULL
 
 
  );
USE alma1;

CREATE TABLE   emp 
 ( 
  name  VARCHAR(25) NOT NULL,
  un  CHAR(10) primary key ,
  pass  char(50) NOT NULL,
  phone  int (8) NOT NULL,
  ll TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 
 
  );

	
