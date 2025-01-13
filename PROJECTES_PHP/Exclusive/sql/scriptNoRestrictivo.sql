CREATE DATABASE ExclusiveBDDpruebas;
USE ExclusiveBDDpruebas;

CREATE TABLE Usuario (
    email VARCHAR(32) PRIMARY KEY,
    nom VARCHAR(32),
    prov VARCHAR(32),
    tpo_usu ENUM('Cliente', 'Empleado', 'Admin')
);
CREATE TABLE Producto (
    ID_prod VARCHAR(32) PRIMARY KEY,
    nom VARCHAR(32),
    descrip VARCHAR(255),
    img VARCHAR(255),
    precio DECIMAL(8,2),
    stock INT,
    tpo_prod ENUM('Herramientas', 'Cabello', 'Fragancia', 'Piel', 'Belleza')
);
CREATE TABLE Pedido (
    ID_pedido VARCHAR(32) PRIMARY KEY,
    direccion VARCHAR(32),
    entregado BOOLEAN,
    precio_total DECIMAL(10,2),
    email VARCHAR(32)
);
CREATE TABLE Incluye (
    ID_pedido VARCHAR(32),
    ID_prod VARCHAR(32),
    cantProd INT,
    precio DECIMAL(8,2),
    PRIMARY KEY (ID_pedido, ID_prod)
);
CREATE TABLE Valoracion (
    ID_val VARCHAR(32) PRIMARY KEY,
    email VARCHAR(32),
    ID_prod VARCHAR(32),
    descrip VARCHAR(255),
    eval ENUM('Excelente', 'Notable', 'Bueno', 'Suficiente', 'Insuficiente')
);
