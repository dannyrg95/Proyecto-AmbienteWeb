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



CREATE TABLE Empleados (
	id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    correo VARCHAR(45),
    nombre VARCHAR(30),
    apellidos VARCHAR(40),
	activo BOOLEAN,
    fecha_registro DATE DEFAULT now()
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE Roles (
	id_rol INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(30),
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE Tareas (
	id_tarea INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(30),
    horas VARCHAR(30),
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES Empleado(id_empleado)
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
GRANT ALL PRIVILEGES ON *.* TO 'proeycto_ambiente'@'localhost';
FLUSH PRIVILEGES;