	USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

    INSERT INTO Permiso (id_permiso, descripcion)
	    VALUES (1, "Lector"),
		       (2, "Suscriptor"),
		       (3, "Contenidista"),
		       (4, "Administrador"),

    INSERT INTO Usuario(mail, contraseña, nombre, apellido, fecha_nac, id_permiso)
	VALUES ('admin@asd.com','asd','asd','asd','20200101', '4'),
			('conte@asd.com','asd','asd','asd','20200101', '3');

/*	INSERT INTO Provincia (id_provincia, descripcion)
	VALUES (1, "Provincia_1"),
		   (2, "Provincia_2");

	INSERT INTO Localidad (id_localidad, descripcion, id_provincia)
	VALUES (1, "Localidad_1", 1),
		   (2, "Localidad_2", 1);

	INSERT INTO Domicilio(id_domicilio, calle, altura, piso, id_localidad)
	VALUES (1, "Domicilio_1", "1111", "1", 1),
		   (2, "Domicilio_2", "2222", "2", 1),
		   (3, "Domicilio_3", "3333", "3", 1),
		   (4, "Domicilio_4", "4444", "4", 2);

	INSERT INTO Tipo_Doc(id_tipo_doc, descripcion)
	VALUES (1, "DNI"),
		   (2, "PASAPORTE"),
		   (3, "LIBRETA CIVICA");

	INSERT INTO Permiso (id_permiso, descripcion)
	VALUES (1, "Permiso_1"),
		   (2, "Permiso_2");


	INSERT INTO Usuario(id_usuario, nombre, apellido, fecha_nac, mail, contraseña, nro_doc, id_tipo_doc, id_domicilio,id_permiso)
	VALUES (1, "nombre1_us", "apellido1_us", "1980-01-01", "email1_us@email.com", "password1_us", 11111111, 1, 1,1),
		   (2, "nombre2_us", "apellido2_us", "1980-01-01", "email2_us@email.com", "password2_us", 22222222, 1, 2,1),
		   (3, "nombre3_us", "apellido3_us", "1980-01-01", "email3_us@email.com", "password3_us", 33333333, 1, 3,2),
		   (4, "nombre4_us", "apellido4_us", "1980-01-01", "email4_us@email.com", "password4_us", 44444444, 2, 4,2);

	INSERT INTO Administrador(id_usuario, legajo)
	VALUES (1, 1);

	INSERT INTO Lector (id_usuario)
	VALUES (2);

	INSERT INTO Suscriptor (id_usuario)
	VALUES (3);

	INSERT INTO Contenidista (id_usuario, legajo)
	VALUES (4, 2);


	INSERT INTO Tipo_Publicacion (id_tipo_publicacion, descripcion)
	VALUES (1, "Tipo_Publicacion_1"),
		   (2, "Tipo_Publicacion_2");

	INSERT INTO Seccion (id_seccion, descripcion, id_publicacion)
	VALUES (1, "Seccion_1", 1),
		   (2, "Seccion_2", 1),
		   (3, "Seccion_3", 2),
		   (4, "Seccion_4", 2);


	INSERT INTO Publicacion (id_publicacion, titulo, bajada, id_imagen, epigrafe_imagen, cuerpo, id_tipo_publicacion, id_seccion, id_usuario,autorizada)
	VALUES (1, "Publicacion_1", "", 1, "", "", 1, 1, 4,1),
		   (2, "Publicacion_2", "", 1, "", "", 1, 1, 4,1),
		   (3, "Publicacion_3", "", 1, "", "", 2, 2, 4,1),
		   (4, "Publicacion_4", "", 1, "", "", 2, 3, 4,1);


	INSERT INTO Tipo_Reaccion (id_tipo_reaccion, descripcion)
	VALUES (1, "Tipo_Reaccion_1"),
		   (2, "Tipo_Reaccion_2"),
		   (3, "Tipo_Reaccion_3"),
		   (4, "Tipo_Reaccion_4");

	INSERT INTO Reaccion (id_reaccion, fecha, id_tipo_reaccion)
	VALUES (1, "2020-10-10", 1),
		   (2, "2020-10-10", 1),
		   (3, "2020-10-10", 2),
		   (4, "2020-10-10", 4);

	INSERT INTO Interaccion (id_interaccion, fecha, id_publicacion, id_reaccion)
	VALUES (1, "2020-10-10", 1, 1),
		   (2, "2020-10-10", 1, 2),
		   (3, "2020-10-10", 2, 3),
		   (4, "2020-10-10", 2, 4);

	INSERT INTO Comentario (id_comentario, descripcion, fecha)
	VALUES (1, "Comentario_1", "2020-10-10"),
		   (2, "Comentario_2", "2020-10-10"),
		   (3, "Comentario_3", "2020-10-10"),
		   (4, "Comentario_4", "2020-10-10");
*/
