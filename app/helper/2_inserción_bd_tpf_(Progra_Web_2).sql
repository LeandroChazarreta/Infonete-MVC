	USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

	INSERT INTO Provincia (descripcion)
	VALUES ("Provincia_1"),
		   ("Provincia_2");

	INSERT INTO Localidad (descripcion, id_provincia)
	VALUES ("Localidad_1", 1),
		   ("Localidad_2", 1);

	INSERT INTO Domicilio(calle, altura, piso, id_localidad)
	VALUES ("Domicilio_1", "1111", "1", 1),
		   ("Domicilio_2", "2222", "2", 1),
		   ("Domicilio_3", "3333", "3", 1),
		   ("Domicilio_4", "4444", "4", 2);

	INSERT INTO Tipo_Doc(descripcion)
	VALUES ("DNI"),
		   ("PASAPORTE"),
		   ("LIBRETA CIVICA");

/*
	 INSERT INTO Permiso (descripcion)
	    VALUES ("Lector"),
		       ("Suscriptor"),
		       ("Contenidista"),
		       ("Administrador");
*/

	INSERT INTO Usuario(nombre, apellido, fecha_nac, mail, contraseña, nro_doc, id_tipo_doc, id_domicilio, id_permiso)
	VALUES ("nombre1_us", "apellido1_us", "1980-01-01", "email1_us@email.com", "password1_us", 11111111, 1, 1, 1),
		   ("nombre2_us", "apellido2_us", "1980-01-01", "email2_us@email.com", "password2_us", 22222222, 1, 2, 1),
		   ("nombre3_us", "apellido3_us", "1980-01-01", "email3_us@email.com", "password3_us", 33333333, 1, 3, 2),
		   ("nombre4_us", "apellido4_us", "1980-01-01", "email4_us@email.com", "password4_us", 44444444, 2, 4, 2);
           
	INSERT INTO Tipo_Publicacion (descripcion)
	VALUES ("Tipo_Publicacion_1"),
		   ("Tipo_Publicacion_2");

	INSERT INTO Seccion (descripcion)
	VALUES ("Politica"),
		   ("Economia"),
		   ("Policiales"),
		   ("Mundo"),
           ("Opinion");

	INSERT INTO Publicacion (titulo, bajada, id_imagen, epigrafe_imagen, cuerpo, id_tipo_publicacion, id_seccion, id_usuario, autorizada)
	VALUES ("Publicacion_1", "Titulo", 1, "epigrafe", "cuerpo", 1, 1, 4, 1),
		   ("Publicacion_2", "Titulo", 1, "epigrafe", "cuerpo", 1, 1, 4, 1),
		   ("Publicacion_3", "Titulo", 1, "epigrafe", "cuerpo", 2, 5, 4, 1),
		   ("Publicacion_4", "Titulo", 1, "epigrafe", "cuerpo", 2, 5, 4, 1);

	INSERT INTO Tipo_Reaccion (descripcion)
	VALUES ("Tipo_Reaccion_1"),
		   ("Tipo_Reaccion_2"),
		   ("Tipo_Reaccion_3"),
		   ("Tipo_Reaccion_4");

	INSERT INTO Reaccion (fecha, id_tipo_reaccion)
	VALUES ("2020-10-10", 1),
		   ("2020-10-10", 1),
		   ("2020-10-10", 2),
		   ("2020-10-10", 4);

	INSERT INTO Interaccion (fecha, id_publicacion, id_reaccion)
	VALUES ("2020-10-10", 1, 1),
		   ("2020-10-10", 1, 2),
		   ("2020-10-10", 2, 3),
		   ("2020-10-10", 2, 4);

	INSERT INTO Comentario (descripcion, fecha)
	VALUES ("Comentario_1", "2020-10-10"),
		   ("Comentario_2", "2020-10-10"),
		   ("Comentario_3", "2020-10-10"),
		   ("Comentario_4", "2020-10-10");
