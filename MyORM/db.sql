CREATE DATABASE IF NOT EXISTS sessions_exercises;

USE sessions_exercises;
CREATE TABLE IF NOT EXISTS users(
  id INT (11) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL ,
  password VARCHAR(255) NOT NULL
);
INSERT INTO users(username,password)values ("Gosho","123");
INSERT INTO users(username,password)values ("Psho","123");
INSERT INTO users(username,password)values ("Iva","4655");
INSERT INTO users(username,password)values ("Iva","4655");

USE sessions_exercises;
SELECT * FROM users;
ALTER TABLE users ADD
first_name VARCHAR (255) NOT NULL
INSERT INTO users(username,password,first_name)values ("Goshko","sdsdsds","Georgi Stoicheva");
USE sess
DELETE FROM users;