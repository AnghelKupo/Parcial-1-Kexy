-- Definición de la tabla Users
CREATE DATABASE bdds7;

USE bdds7;

CREATE TABLE Users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    pic BLOB,
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

-- Definición de la tabla Notes
CREATE TABLE Notes (
    id_note INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(id_user) ON DELETE CASCADE
);

-- Creación del usuario
CREATE USER 'ds72023'@'localhost' IDENTIFIED BY 'ds72023';
GRANT ALL PRIVILEGES ON *.* TO 'ds72023'@'localhost' WITH GRANT OPTION;

-- Inserts de los usuarios de prueba, contraseñas: 12345
INSERT INTO Users (name, last_name, email, pass) VALUES
('Ana', 'Valencia', 'ana@ana.com', '$2y$10$AwZyNZjMluAjajAlYEser.R4mhZ5HdEftql/krIzxbEodAFv5Rb1u'),
('Flavio', 'Sánchez', 'flavio@flavio.com', '$2y$10$9LjziUJ1jZVK1BIJvkE9WOxm/SFhQPItroo4Ecu4lvr9Q.nUuhHLO');

-- Insert del admin, contraseña: 12345
INSERT INTO Users (name, last_name, email, pass, role) VALUES
('Alik', 'Dev', 'admin@admin.com', '$2y$10$J8W6Fr70Iloq9ScrSvuQVOb/N3tXVTIlmleXLuACKXKBhZV/bMnpe', 'admin');

-- Inserts de las notas de prueba
INSERT INTO Notes (title, description, user_id) VALUES
('Hacer la terea de mates', 'Hoy, me he dado cuenta de que tengo una tarea de matemáticas pendiente que necesita mi atención. Tengo que dedicar tiempo a resolver los problemas y ejercicios que se me asignaron. Es fundamental para mi aprendizaje y para cumplir con mis responsabilidades académicas. Así que, voy a centrarme en completar esta tarea de matemáticas de manera efectiva.', 1),
('Limpiar la casa', 'Hoy, me he dado cuenta de que tengo una tarea de matemáticas pendiente que necesita mi atención. Tengo que dedicar tiempo a resolver los problemas y ejercicios que se me asignaron. Es fundamental para mi aprendizaje y para cumplir con mis responsabilidades académicas. Así que, voy a centrarme en completar esta tarea de matemáticas de manera efectiva.', 1),
('Sacar a mi perrita Luna', 'Hoy, me aseguraré de cuidar a mi leal compañera, Luna. Es hora de sacarla a pasear para que pueda disfrutar del aire fresco y hacer ejercicio. Pasar tiempo de calidad con mi perrita es importante para su bienestar y para fortalecer nuestro vínculo. Así que, me aseguraré de llevarla a dar un agradable paseo.', 2),
('Trabajar en el proyecto', 'Tengo un proyecto importante en el que estoy trabajando y hoy es un día clave para avanzar en él. Es una gran oportunidad para hacer progresos significativos y contribuir al éxito del proyecto. Así que, me sumergiré en mi trabajo y me enfocaré en los objetivos del proyecto para lograr un avance significativo.', 2);