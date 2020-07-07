	USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

INSERT INTO provincia (id, nombreProvincia)
VALUES (1, "BUENOS_AIRES"),
	   (2, "CORDOBA"),
       (3, "SANTA_FE");

INSERT INTO partido (id, nombrePartido ,provincia_id)
VALUES (1, "MORON", 1),
	   (2, "EZEIZA", 1),
       (3, "AVELLANEDA", 1),
       (4, "TRES_DE_FEBRERO", 1),
       (5, "SAN_JUSTO", 1),
       (6, "MONSERRAT", 1);

INSERT INTO domicilio(id, calle, altura, piso, localidad_id)
VALUES (1, "Las Heras", 1200, null, 1),
	   (2, "Los Arcos", 3300, "1", 1),
	   (3, "Peribebuy", 450, null, 6),
	   (4, "Ingeniero Huergo", 1550, "2",  6),
       (5, "Hipólito Yrigoyen", 1650, null, 4),
       (6, "Pilar", 950, null, 6),
       (7, "Av. Rivadavia", 17961, null, 5),
       (8, "Solís", 463, "4", 5);

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
	VALUES ("Alberto", "Rodriguez", "1980-01-01", "alberto@email.com", "1234", 11111111, 1, 1, 1),
		   ("Alan", "Rodriguez", "1980-01-01", "alan@email.com", "1234", 22222222, 1, 2, 1),
		   ("Carla", "Rodriguez", "1980-01-01", "carla@email.com", "1234", 33333333, 1, 3, 2),
		   ("Celeste", "Rodriguez", "1980-01-01", "celeste@email.com", "1234", 44444444, 2, 4, 2);
           
	INSERT INTO Tipo_Publicacion (descripcion)
	VALUES ("Periodistica"),
		   ("Revista");

	INSERT INTO Seccion (descripcion)
	VALUES ("Coronavirus"),
	       ("Politica"),
		   ("Economia"),
		   ("Policiales"),
		   ("Mundo"),
           ("Policiales"),
           ("Deportes"),
           ("Opinion"),
           ("Espectaculos"),
           ("Revista");

	INSERT INTO Publicacion (titulo, bajada, imagen, epigrafe_imagen, cuerpo, id_tipo_publicacion, id_seccion, id_usuario, autorizada)
	VALUES ("Caida del peso en la argentina", "En la actualidad la caída de la moneda nacional sorprende en muchos países del mundo, pero en la Argentina es cosa común", "economia-1.jpg", "epigrafe", "cuerpo", 1, 2, 4, 1),
		   ("Así cuidan sus bolsillos los argentinos", "El valor del dolar sorprende en muchos países del mundo", "economia-2.jpg", "epigrafe", "cuerpo", 1, 2, 4, 1),
		   ("Se ampia la desigualdad económica", "El valor del dolar sorprende en muchos países del mundo", "economia-3.jpg", "epigrafe", "cuerpo", 1, 2, 4, 1),
		   ("Situación de  la pandeia mundial", "La situación de  la pandeia mundial ha generado cambios en todos los aspectos de la vida humana", "covid-1.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1),
           ("Anuncian estudios esperanzadores acerca del tratamiento ante el covid", "Recientes estudios de la organización de médicos internacionales ha presentado un estudio que podría cambiar el panorama actual", "covid-2.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1),
		   ("Se refuerzan los controles", "Con los nuevos controles más estrictos se espera aplanar la curva de contagios", "covid-3.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1),
		   ("Se reanudan los deportes", "Muchos deportes se reanudan luego de meses sin actividad", "deportes-1.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1),
		   ("Volver a entrenar", "Se abren las puertas de muchos clubes para retomar con los entrenamientos", "deportes-2.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1),
		   ("Tribunas vacias", "A puertas cerradas, los partidos vuelven a disputarse aunque con sensaciones extrañas", "deportes-3.jpg", "epigrafe", "cuerpo", 1, 5, 4, 1);

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
