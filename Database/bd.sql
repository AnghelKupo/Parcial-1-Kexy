-- Definición de la tabla Users
CREATE DATABASE bdds7;

USE bdds7;

CREATE TABLE Users (
    id_user INT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    pass VARCHAR(255),
    pic BLOB,
    name VARCHAR(255),
    last_name VARCHAR(255),
    role VARCHAR(50)
);

-- Definición de la tabla Notes
CREATE TABLE Notes (
    id_note INT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    date DATE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id_user)
);
