DROP DATABASE IF EXISTS UNLAM_Progra_Web_2_Trabajo_Practico_Final;
CREATE DATABASE IF NOT EXISTS UNLAM_Progra_Web_2_Trabajo_Practico_Final;
USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

CREATE TABLE Provincia
(id_provincia INT UNSIGNED AUTO_INCREMENT,
 descripcion VARCHAR(40) NOT NULL,
 PRIMARY KEY (id_provincia));

CREATE TABLE Localidad
(id_localidad INT UNSIGNED AUTO_INCREMENT,
 descripcion VARCHAR(40) NOT NULL,
 id_provincia INT UNSIGNED,
 PRIMARY KEY (id_localidad),
     FOREIGN KEY (id_provincia) REFERENCES Provincia (id_provincia));

    CREATE TABLE Domicilio
    (id_domicilio INT UNSIGNED AUTO_INCREMENT,
     calle VARCHAR(40) NOT NULL,
     altura VARCHAR(40) NOT NULL,
     piso VARCHAR(40),
     id_localidad INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_domicilio),
     FOREIGN KEY (id_localidad) REFERENCES Localidad (id_localidad));

    CREATE TABLE Tipo_Doc
    (id_tipo_doc SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_tipo_doc));

    CREATE TABLE Permiso
    (id_permiso INT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_permiso));

    CREATE TABLE Usuario
    (id_usuario INT UNSIGNED AUTO_INCREMENT,
     nombre VARCHAR(250) NOT NULL,
     apellido VARCHAR(250) NOT NULL,
     fecha_nac DATE,
     mail VARCHAR(250) NOT NULL,
     contraseña VARCHAR(250) NOT NULL,
     nro_doc INT UNSIGNED UNIQUE,
     id_tipo_doc SMALLINT UNSIGNED,
     id_domicilio INT UNSIGNED,
     id_permiso INT UNSIGNED,
     PRIMARY KEY (id_usuario),
     FOREIGN KEY (id_tipo_doc) REFERENCES Tipo_Doc (id_tipo_doc),
     FOREIGN KEY (id_domicilio) REFERENCES Domicilio (id_domicilio),
     FOREIGN KEY (id_permiso) REFERENCES Permiso (id_permiso));

/*	
    CREATE TABLE Contenidista
    (id_usuario INT UNSIGNED,
     legajo VARCHAR(250) UNIQUE NOT NULL,
     PRIMARY KEY (id_usuario),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario));

    CREATE TABLE Administrador
    (id_usuario INT UNSIGNED AUTO_INCREMENT,
     legajo INT UNSIGNED UNIQUE NOT NULL,
     PRIMARY KEY (id_usuario),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario));

    CREATE TABLE Lector
    (id_usuario INT UNSIGNED,
     PRIMARY KEY (id_usuario),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario));

    CREATE TABLE Suscriptor
    (id_usuario INT UNSIGNED,
     PRIMARY KEY (id_usuario),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario));
*/

    CREATE TABLE Tipo_Publicacion
    (id_tipo_publicacion SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_tipo_publicacion));

    CREATE TABLE Seccion
    (id_seccion SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_seccion));

    CREATE TABLE Publicacion
    (id_publicacion INT UNSIGNED AUTO_INCREMENT,
     titulo VARCHAR(40) NOT NULL,
     bajada VARCHAR(1000),
     id_imagen INT UNSIGNED,
     epigrafe_imagen VARCHAR (600),
     cuerpo VARCHAR (10000),
     id_tipo_publicacion SMALLINT UNSIGNED,
     id_seccion SMALLINT UNSIGNED,
     id_usuario INT UNSIGNED,
     autorizada BOOLEAN ,
     PRIMARY KEY (id_publicacion),
     FOREIGN KEY (id_tipo_publicacion) REFERENCES Tipo_Publicacion (id_tipo_publicacion),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario),
     FOREIGN KEY (id_seccion) REFERENCES Seccion (id_seccion));

    CREATE TABLE Tipo_Reaccion
    (id_tipo_reaccion SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_tipo_reaccion));

    CREATE TABLE Reaccion
    (id_reaccion INT UNSIGNED AUTO_INCREMENT,
     fecha DATE NOT NULL,
     id_tipo_reaccion SMALLINT UNSIGNED NOT NULL,
     PRIMARY KEY (id_reaccion),
     FOREIGN KEY (id_tipo_reaccion) REFERENCES Tipo_Reaccion (id_tipo_reaccion));

    CREATE TABLE Interaccion
    (id_interaccion INT UNSIGNED AUTO_INCREMENT,
     fecha DATE NOT NULL,
     id_publicacion INT UNSIGNED NOT NULL,
     id_reaccion INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_interaccion),
     FOREIGN KEY (id_publicacion) REFERENCES Publicacion (id_publicacion),
     FOREIGN KEY (id_reaccion) REFERENCES Reaccion (id_reaccion));

    CREATE TABLE Comentario
    (id_comentario INT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     fecha DATE NOT NULL,
     PRIMARY KEY (id_comentario));

    CREATE TABLE Interaccion_Comentario
    (id_interaccion_comentario INT UNSIGNED AUTO_INCREMENT,
     id_interaccion INT UNSIGNED NOT NULL,
     id_comentario INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_interaccion_comentario),
     FOREIGN KEY (id_interaccion) REFERENCES Interaccion (id_interaccion),
     FOREIGN KEY (id_comentario) REFERENCES Comentario (id_comentario));

    CREATE TABLE Contenido_Por_Suscripcion
    (id_contenido_por_suscripcion INT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_contenido_por_suscripcion));

    CREATE TABLE Catalogo
    (id_catalogo INT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     fecha DATE NOT NULL,
     id_usuario INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_catalogo),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario));

    CREATE TABLE Catalogo_Lector
    (id_catalogo_lector INT UNSIGNED AUTO_INCREMENT,
     id_catalogo INT UNSIGNED NOT NULL,
     id_usuario INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_catalogo_lector),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario),
     FOREIGN KEY (id_catalogo) REFERENCES Catalogo (id_catalogo));

    CREATE TABLE Catalogo_Suscriptor
    (id_catalogo_suscriptor INT UNSIGNED AUTO_INCREMENT,
     id_catalogo INT UNSIGNED NOT NULL,
     id_usuario INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_catalogo_suscriptor),
     FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario),
     FOREIGN KEY (id_catalogo) REFERENCES Catalogo (id_catalogo));

    CREATE TABLE Tipo_Suscripcion
    (id_tipo_suscripcion SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_tipo_suscripcion));

    CREATE TABLE Suscripcion
    (id_suscripcion INT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     id_contenido_por_suscripcion INT UNSIGNED NOT NULL,
     id_catalogo INT UNSIGNED NOT NULL,
     id_tipo_suscripcion SMALLINT UNSIGNED NOT NULL,
     PRIMARY KEY (id_suscripcion),
     FOREIGN KEY (id_contenido_por_suscripcion) REFERENCES Contenido_Por_Suscripcion (id_contenido_por_suscripcion),
     FOREIGN KEY (id_tipo_suscripcion) REFERENCES Tipo_Suscripcion (id_tipo_suscripcion),
     FOREIGN KEY (id_catalogo) REFERENCES Catalogo (id_catalogo));

    CREATE TABLE Tipo_Factura
    (id_tipo_factura SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_tipo_factura));

    CREATE TABLE Factura
    (id_factura INT UNSIGNED AUTO_INCREMENT,
     importe DOUBLE UNSIGNED NOT NULL,
     fecha DATE NOT NULL,
     id_suscripcion INT UNSIGNED NOT NULL,
     id_tipo_factura SMALLINT UNSIGNED NOT NULL,
     PRIMARY KEY (id_factura),
     FOREIGN KEY (id_tipo_factura) REFERENCES Tipo_Factura (id_tipo_factura),
     FOREIGN KEY (id_suscripcion) REFERENCES Suscripcion (id_suscripcion));

    CREATE TABLE Medio_Pago
    (id_medio_pago SMALLINT UNSIGNED AUTO_INCREMENT,
     descripcion VARCHAR(40) NOT NULL,
     PRIMARY KEY (id_medio_pago));

    CREATE TABLE Pago
    (id_pago INT UNSIGNED AUTO_INCREMENT,
     importe DOUBLE UNSIGNED NOT NULL,
     fecha DATE NOT NULL,
     id_medio_pago SMALLINT UNSIGNED NOT NULL,
     id_factura INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_pago),
     FOREIGN KEY (id_medio_pago) REFERENCES Medio_Pago (id_medio_pago),
     FOREIGN KEY (id_factura) REFERENCES Factura (id_factura));

    CREATE TABLE publicacion_Contenido
    (id_publicacion_contenido INT UNSIGNED AUTO_INCREMENT,
     id_publicacion INT UNSIGNED NOT NULL,
     id_contenido_por_suscripcion INT UNSIGNED NOT NULL,
     PRIMARY KEY (id_publicacion_contenido),
     FOREIGN KEY (id_publicacion) REFERENCES Publicacion (id_publicacion),
     FOREIGN KEY (id_contenido_por_suscripcion) REFERENCES Contenido_Por_Suscripcion (id_contenido_por_suscripcion));


INSERT INTO Permiso (id_permiso, descripcion)
VALUES (1, "Lector"),
       (2, "Suscriptor"),
       (3, "Contenidista"),
       (4, "Administrador");

INSERT INTO Usuario(mail, contraseña, nombre, apellido, fecha_nac, id_permiso)
        VALUES ('admin@asd.com','a8f5f167f44f4964e6c998dee827110c','asd','asd','20200101', '4'),
         ('conte@asd.com','a8f5f167f44f4964e6c998dee827110c','asd','asd','20200101', '3');