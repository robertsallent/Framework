
DROP DATABASE IF EXISTS framework;

CREATE DATABASE IF NOT EXISTS framework 
	DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE framework;

CREATE TABLE usuarios(
	 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	 usuario VARCHAR(16) NOT NULL UNIQUE KEY, 
	 clave VARCHAR(32) NOT NULL, 
	 nombre VARCHAR(32) NOT NULL, 
	 apellido1 VARCHAR(32) NOT NULL, 
	 apellido2 VARCHAR(32) NOT NULL,
	 privilegio INT NOT NULL DEFAULT 0, 
	 administrador BOOLEAN NOT NULL DEFAULT 0, 
	 email VARCHAR(128) NOT NULL UNIQUE KEY, 
	 imagen VARCHAR(256) NULL DEFAULT NULL, 
	 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, 
	 updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO usuarios( usuario, clave, nombre, apellido1, apellido2, privilegio, administrador, email) 
VALUES( 'admin','81dc9bdb52d04dc20036dbd8313ed055', 'administrador', 'CIFO', 'Sabadell', 1000, 1, 'admin@cifo.cat') 