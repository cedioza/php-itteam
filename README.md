## API REST para CRUD de usuarios en PHP
Este proyecto tiene como objetivo desarrollar un API REST clásico para el servicio CRUD de usuarios en PHP, donde se puedan consultar, crear, actualizar y eliminar usuarios. También se implementará un modelo de base de datos que incluye Nombre, Apellido, Edad, Foto, Tipo de Documento y la creación de su respectivo servicio CRUD y relación con la tabla Rol.

## Tecnologías utilizadas
- PHP
- MySQL
- Git y GitHub
- 
## Instalación
Clona el repositorio: git clone [https://github.com/cedioza/php-itteam](https://github.com/cedioza/php-itteam)
Crea una base de datos en MySQL y ejecuta el archivo database.sql para crear las tablas necesarias.

## SQL

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

INSERT INTO roles (nombre) VALUES ('Administrador'), ('Comprador');

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    foto VARCHAR(255),
    tipo_documento ENUM('Cedula', 'NIT', 'RUC') NOT NULL,
    rol_id INT,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

Configura los datos de conexión a la base de datos en el archivo config.php.

## Documentación postman 

[Postman]([https://github.com/cedioza/php-itteam](https://documenter.getpostman.com/view/17377152/2s93RRxZYT))

# Live

https://itteamtest.000webhostapp.com/api/api.php


