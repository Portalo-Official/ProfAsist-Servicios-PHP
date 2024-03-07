DROP DATABASE IF EXISTS ProAsist;
Create database ProAsist;
use ProAsist;
Create table Profesores (
    id_profesor int(9) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    Especialidad VARCHAR(100) ,
    pass VARCHAR(75) NOT NULL
);
-- Indexar columna profesores
CREATE INDEX idx_profesor_id ON Profesores (id_profesor);

Create table Horario_profesor(
    id int(9) PRIMARY KEY AUTO_INCREMENT,
    profesor int(9) NOT NULL,
    hora_numero ENUM('1', '2', '3', '4', '5', '6'),
    dia_semana ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday') NOT NULL,
    grupo VARCHAR(25)
);
-- FOREIGN KEY (profesor) REFERENCES profesores(id_profesor) ON DELETE CASCADE
-- Agrega la clave foránea en Horario_profesor
ALTER TABLE Horario_profesor
ADD CONSTRAINT fk_profesor
FOREIGN KEY (profesor) REFERENCES Profesores(id_profesor)
ON DELETE CASCADE;

Create table asistencia_faltas(
    id int(9) PRIMARY KEY AUTO_INCREMENT,
    profesor int(9) NOT NULL,
    fecha DATE NOT NULL,
    hora_numero ENUM('1', '2', '3', '4', '5', '6')
);
-- FOREIGN KEY (profesor) REFERENCES profesores(id_profesor) ON DELETE CASCADE
ALTER TABLE asistencia_faltas
ADD CONSTRAINT fk_profesor_faltas
FOREIGN KEY (profesor) REFERENCES Profesores(id_profesor)
ON DELETE CASCADE;



INSERT into profesores(nombre, apellido, especialidad, pass) 
        values('Nieves','Tejeda','Programacion','Ni3v3s'),
              ('Adelaida','Mendez','Programacion','4delaida'),
              ('Maria Eugenia','Tejeda','Administracion','M4ria');

INSERT into Horario_profesor(profesor,hora_numero, dia_semana, grupo) 
        values(1, '1', 'Tuesday', '1DAM'),
              (1, '2', 'Tuesday', '1DAM'),
              (1, '3', 'Tuesday', '1DAM'),
              (1, '4', 'Tuesday', '1DAM'),
              (1, '5', 'Tuesday', '1DAM'),
              (1, '6', 'Tuesday', '1DAM'),
              (2, '1', 'Wednesday', '2DAM'),
              (2, '2', 'Wednesday', '2DAM'),
              (2, '3', 'Wednesday', '2DAM'),
              (2, '4', 'Wednesday', '2DAM');

INSERT into Horario_profesor(profesor,hora_numero, dia_semana, grupo) 
        values(1, '1', 'Thursday', '1DAM'),
              (1, '2', 'Thursday', '1DAM'),
              (1, '3', 'Thursday', '1DAM'),
              (3, '4', 'Thursday', '1DAM'),
              (3, '5', 'Thursday', '1DAM'),
              (3, '6', 'Thursday', '1DAM'),
              (2, '1', 'Thursday', '2DAM'),
              (2, '2', 'Thursday', '2DAM'),
              (2, '3', 'Thursday', '2DAM'),
              (2, '3', 'Thursday', '2DAM'),
              (2, '4', 'Thursday', '2DAM');

-- Profesor 1
INSERT INTO asistencia_faltas (profesor, fecha, hora_numero)
VALUES
    (1, '2024-03-06', '1'), 
    (1, '2024-03-06', '2'),
    (1, '2024-03-07', '4'), 
    (1, '2024-03-07', '5'), 
    (1, '2024-03-08', '5'); 

-- Profesor 2
INSERT INTO asistencia_faltas (profesor, fecha, hora_numero)
VALUES
    (2, '2024-03-06', '2'), 
    (2, '2024-03-06', '3'), 
    (2, '2024-03-07', '4'), 
    (2, '2024-03-07', '5'), 
    (2, '2024-03-07', '6'), 
    (2, '2024-03-08', '4'); 

-- Profesor 3
INSERT INTO asistencia_faltas (profesor, fecha, hora_numero)
VALUES
    (3, '2024-03-06', '1'), 
    (3, '2024-03-07', '2'), 
    (3, '2024-03-08', '3'); 

-- Queries 

-- Get-Faltas-Today
SELECT
    P.nombre,
    P.apellido,
    AF.hora_numero as hora,
    HP.dia_semana as dia,
    HP.grupo
FROM
    Profesores P
INNER JOIN
    asistencia_faltas AF ON P.id_profesor = AF.profesor
INNER JOIN
    Horario_profesor HP ON  AF.hora_numero = HP.hora_numero
WHERE
    AF.fecha = CURDATE() AND HP.dia_semana=DAYNAME(AF.fecha);

--  GET_FALTAS_TOMORROW
-- DATE_ADD(CURDATE(), INTERVAL 1 DAY); -> para ver el dia siguiente sumar 1 dia
SELECT
    P.nombre,
    P.apellido,
    AF.hora_numero as hora,
    HP.dia_semana as dia,
    HP.grupo
FROM
    Profesores P
INNER JOIN
    asistencia_faltas AF ON P.id_profesor = AF.profesor
INNER JOIN
    Horario_profesor HP ON  AF.hora_numero = HP.hora_numero
WHERE
    AF.fecha = DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND HP.dia_semana=DAYNAME(AF.fecha);