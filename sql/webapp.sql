DROP DATABASE IF EXISTS webapp;
CREATE DATABASE webapp;
USE webapp;

CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT
	, username VARCHAR(30) NOT NULL
	, email VARCHAR(50) NOT NULL
	, password VARCHAR(32) NOT NULL
	, rol ENUM('N','A') NOT NULL
	, PRIMARY KEY (id)
	, UNIQUE KEY users_username(username)
	, UNIQUE KEY users_email(email)
);

INSERT INTO users(username, email, password, rol) VALUES 
('admin','admin@example.com',MD5(123456), 'A')
, ('danielm','danielm@example.com',MD5(123456), 'N');

CREATE TABLE videojuegos(
	id INT NOT NULL AUTO_INCREMENT
	, nombre VARCHAR(50) NOT NULL
	, precio DECIMAL(9,2) NOT NULL
	, estado ENUM('1','0') NOT NULL
	, PRIMARY KEY (id)
) ENGINE=INNODB;

INSERT INTO videojuegos (nombre, estado, precio) VALUES
  ('Gears of war 5', '1', 800)
, ('Call of Duty Modern Warfare', '1', 1200)
, ('Grand Theft Auto V', '0', 0);


SELECT * FROM users WHERE email = "admin@example.com" AND PASSWORD = MD5('123456');