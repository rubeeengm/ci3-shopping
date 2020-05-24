DROP DATABASE IF EXISTS webapp;
CREATE DATABASE webapp;
USE webapp;

CREATE TABLE materias(
    idmaterias INT NOT NULL AUTO_INCREMENT
     , clavemateria VARCHAR(3) NOT NULL
     , nombremateria VARCHAR(64) NOT NULL
     , estatusmateria VARCHAR(1) NOT NULL
     , PRIMARY KEY (idmaterias)
) ENGINE=INNODB;

INSERT INTO materias (idmaterias, clavemateria, nombremateria, estatusmateria) VALUES
(1, '9JJ', 'Programacion Wev', '1'),
(3, '9gg', 'web ', '2');

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