CREATE DATABASE ffw_task;
USE ffw_task;
CREATE TABLE IF NOT EXISTS users(
  id INT (11) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE ,
  email VARCHAR(255) NOT NULL UNIQUE ,
  password VARCHAR (255)NOT NULL
);

CREATE TABLE IF NOT EXISTS images (
  id INT(11)  PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR (255)NOT NULL,
  userId INT(11)NOT NULL,
  visibility VARCHAR (255) NOT NULL,
  sort INT(2) NULL ,
  CONSTRAINT images___fk
  FOREIGN KEY (userId) REFERENCES users(id)
);