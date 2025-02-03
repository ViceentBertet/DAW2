CREATE DATABASE ExclusiveBDD;
USE ExclusiveBDD;

CREATE TABLE Usuario (
    email VARCHAR(32) PRIMARY KEY,
    nom VARCHAR(32) NOT NULL,
    pwd VARCHAR(32) NOT NULL,
    tpo_usu ENUM('Cliente', 'Empleado', 'Admin') NOT NULL
);
CREATE TABLE Producto (
    ID_prod VARCHAR(32) NOT NULL PRIMARY KEY,
    nom VARCHAR(32) NOT NULL,
    descrip VARCHAR(255),
    img VARCHAR(255) NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    stock INT NOT NULL,
    tipo_prod ENUM('Herramientas', 'Cabello', 'Fragancia', 'Piel', 'Belleza') NOT NULL
);
CREATE TABLE Pedido (
    ID_pedido VARCHAR(32) NOT NULL PRIMARY KEY,
    direccion VARCHAR(32) NOT NULL,
    entregado BOOLEAN NOT NULL,
    precio_total DECIMAL(10,2) NOT NULL,
    email VARCHAR(32) NOT NULL,
    FOREIGN KEY (email) REFERENCES Usuario(email)
);
CREATE TABLE Incluye (
    ID_pedido VARCHAR(32) NOT NULL,
    ID_prod VARCHAR(32) NOT NULL,
    cantProd INT NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    PRIMARY KEY (ID_pedido, ID_prod),
    FOREIGN KEY (ID_pedido) REFERENCES Pedido(ID_pedido),
    FOREIGN KEY (ID_prod) REFERENCES Producto(ID_prod)
);
CREATE TABLE Valoracion (
    ID_val VARCHAR(32) NOT NULL PRIMARY KEY,
    email VARCHAR(32) NOT NULL,
    ID_prod VARCHAR(32) NOT NULL,
    descrip VARCHAR(255),
    eval ENUM('Excelente', 'Notable', 'Bueno', 'Suficiente', 'Insuficiente') NOT NULL,
    FOREIGN KEY (email) REFERENCES Usuario(email),
    FOREIGN KEY (ID_prod) REFERENCES Producto(ID_prod)
);
