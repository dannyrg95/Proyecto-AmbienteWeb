CREATE DATABASE proyecto_ambiente;

USE proyecto_ambiente;
CREATE TABLE Proyectos (
	id_proyecto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30),
    fecha_inicio DATE,
    fecha_fin DATE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


CREATE TABLE Usuarios (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(30),
    password VARCHAR(30),
    activo BOOLEAN
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


CREATE TABLE Empleados (
	id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    correo VARCHAR(45),
    nombre VARCHAR(30),
    apellidos VARCHAR(40),
	activo BOOLEAN,
    fecha_registro DATETIME DEFAULT now()
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE Roles (
	id_rol INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(30),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE Tareas (
	id_tarea INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(30),
    horas VARCHAR(30),
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;





CREATE TABLE Proyectos_Empleados(
	id_pe INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_proyecto INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado),
    FOREIGN KEY (id_proyecto) REFERENCES Proyectos(id_proyecto)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


CREATE USER 'proyecto_ambiente'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'proyecto_ambiente'@'localhost';
FLUSH PRIVILEGES;




-- Insert 1
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado1@example.com', 'Juan', 'Perez', true);

-- Insert 2
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado2@example.com', 'Maria', 'Gomez', true);

-- Insert 3
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado3@example.com', 'Carlos', 'Lopez', false);

-- Insert 4
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado4@example.com', 'Laura', 'Rodriguez', true);

-- Insert 5
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado5@example.com', 'Pedro', 'Martinez', false);

-- Insert 6
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado6@example.com', 'Ana', 'Sanchez', true);

-- Insert 7
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado7@example.com', 'Diego', 'Gutierrez', true);

-- Insert 8
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado8@example.com', 'Elena', 'Fernandez', false);

-- Insert 9
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado9@example.com', 'Sergio', 'Hernandez', true);

-- Insert 10
INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado10@example.com', 'Carmen', 'Diaz', true);
