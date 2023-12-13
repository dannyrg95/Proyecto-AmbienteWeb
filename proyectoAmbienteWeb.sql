CREATE DATABASE proyecto_ambiente;

USE proyecto_ambiente;


CREATE TABLE Proyectos (
	id_proyecto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
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
    titulo VARCHAR(50),
    horas INT
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE Usuarios (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(30),
    correo VARCHAR(45) UNIQUE,
    password VARCHAR(30),
    activo BOOLEAN
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;




CREATE TABLE Proyectos_Empleados(
	id_pe INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_proyecto INT,
    id_tarea INT,
    FOREIGN KEY (id_tarea) REFERENCES Tarea(id_tarea),
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado),
    FOREIGN KEY (id_proyecto) REFERENCES Proyectos(id_proyecto)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE Tokens (
	id_token INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    token VARCHAR(200),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

SELECT empleados.* FROM Proyectos_Empleados INNER JOIN Empleados ON proyectos_empleados.id_empleado = empleados.id_empleado AND id_proyecto = 3;

SELECT usuarios.id_usuario FROM Tokens INNER JOIN Usuarios ON usuarios.id_usuario = tokens.id_usuario AND tokens.token = "3fb827822dbfb77162d3f2f296f1177f";

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado1@example.com', 'Juan', 'Perez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado2@example.com', 'Maria', 'Gomez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado3@example.com', 'Carlos', 'Lopez', false);


INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado4@example.com', 'Laura', 'Rodriguez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado5@example.com', 'Pedro', 'Martinez', false);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado6@example.com', 'Ana', 'Sanchez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado7@example.com', 'Diego', 'Gutierrez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado8@example.com', 'Elena', 'Fernandez', false);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado9@example.com', 'Sergio', 'Hernandez', true);

INSERT INTO Empleados (correo, nombre, apellidos, activo) 
VALUES ('empleado10@example.com', 'Carmen', 'Diaz', true);


INSERT INTO Usuarios (id_usuario, usuario, correo, password, activo) VALUES
(NULL, 'JuanPerez', 'juan.perez@example.com', 'clave1', 1),
(NULL, 'AnaGomez', 'ana.gomez@example.com', 'clave2', 1),
(NULL, 'CarlosRodriguez', 'carlos.rodriguez@example.com', 'clave3', 0);



INSERT INTO Roles (descripcion, id_usuario) VALUES
('Administrador', 1),
('Usuario', 2);  

INSERT INTO Proyectos (nombre, fecha_inicio, fecha_fin) VALUES
('Desarrollo de la Plataforma E-Commerce', '2023-01-10', '2023-03-20'),
('Implementación del Sistema de Gestión de Recursos Humanos', '2023-02-05', '2023-05-15'),
('Rediseño del Sitio Web Corporativo', '2023-03-15', '2023-06-30'),
('Lanzamiento de la Aplicación Móvil', '2023-04-20', '2023-07-10'),
('Proyecto de Investigación en Inteligencia Artificial', '2023-05-01', '2023-08-15'),
('Mejora de la Infraestructura de Red', '2023-06-10', '2023-09-25'),
('Desarrollo de un Sistema de Gestión de Inventarios', '2023-07-15', '2023-10-05'),
('Implementación de Medidas de Seguridad Cibernética', '2023-08-01', '2023-11-20'),
('Proyecto de Expansión Internacional', '2023-09-10', '2023-12-10'),
('Optimización de Procesos de Producción', '2023-10-15', '2024-01-15');

            
            
INSERT INTO Tareas (titulo, horas) VALUES
('Hacer investigación', '2'),
('Preparar presentación', '3'),
('Revisar correos electrónicos', '1'),
('Entrenamiento de equipo', '4'),
('Actualizar informes', '2.5'),
('Organizar reunión de proyecto', '1.5'),
('Realizar pruebas de software', '5'),
('Redactar informe mensual', '2'),
('Planificar eventos futuros', '3'),
('Entrevistar candidatos', '4'),
('Revisar código fuente', '2'),
('Resolver problemas técnicos', '3.5'),
('Colaborar con otros departamentos', '1.5'),
('Asistir a la capacitación', '2'),
('Actualizar documentación', '2.5');
            
            
            
            
CREATE USER 'proyecto_ambiente'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'proyecto_ambiente'@'localhost';
FLUSH PRIVILEGES;


