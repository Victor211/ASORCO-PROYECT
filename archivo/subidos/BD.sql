CREATE DATABASE asorco-archivos;

-- TABLA DE USUARIOS PARA CONTROLAR LOS USUARIOS QUE ESTARAN DISPONIBLES PARA SUBIR LOS ARCHIVOS DISPONIBLES EN LA PAGINA WEB
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL
);

-- DATO SEMILLA PARA USUARIOS
INSERT INTO Usuarios (cedula, usuario, pass)
VALUES ('123456', 'adminAsorco', '');

-- TABLA DE ARCHIVOS, EN ELLA SE REGISTRARAN LOS ARCHIVOS SUBIDOS AL SERVIDOR, Y QUE SE MOSTRARAN EN LA PAGINA WEB

CREATE TABLE archivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    nombre_archivo VARCHAR(255) NOT NULL,
    nombre_mostrar VARCHAR(255) NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);
