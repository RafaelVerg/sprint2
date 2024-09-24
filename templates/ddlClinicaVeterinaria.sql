-- Clínica Veterinária

DROP DATABASE IF EXISTS ClinicaVeterinaria;

CREATE DATABASE ClinicaVeterinaria;

USE ClinicaVeterinaria;

CREATE TABLE Animal(
	CodAnimal INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Tipo VARCHAR(50) NOT NULL,
    Observacoes VARCHAR(100)
);

