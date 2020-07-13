	USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

INSERT INTO provincia (id_provincia, descripcion)
VALUES (1, "BUENOS_AIRES"),
	   (2, "CORDOBA"),
       (3, "SANTA_FE");

INSERT INTO localidad (id_localidad, descripcion ,id_provincia)
VALUES (1, "MORON", 1),
	   (2, "EZEIZA", 1),
       (3, "AVELLANEDA", 1),
       (4, "TRES_DE_FEBRERO", 1),
       (5, "SAN_JUSTO", 1),
       (6, "MONSERRAT", 1);

INSERT INTO domicilio(id_domicilio, calle, altura, piso, id_localidad)
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
/*----------- Usuarios con password: "1234" -------------*/
	INSERT INTO Usuario(nombre, apellido, fecha_nac, mail, contraseña, nro_doc, id_tipo_doc, id_domicilio, id_permiso)
	VALUES ("Alberto", "Rodriguez", "1980-01-01", "alberto@email.com", '81dc9bdb52d04dc20036dbd8313ed055', 11111111, 1, 1, 1),
		   ("Alan", "Rodriguez", "1980-01-01", "alan@email.com", '81dc9bdb52d04dc20036dbd8313ed055', 22222222, 1, 2, 1),
		   ("Carla", "Rodriguez", "1980-01-01", "carla@email.com", '81dc9bdb52d04dc20036dbd8313ed055', 33333333, 1, 3, 2),
		   ("Celeste", "Rodriguez", "1980-01-01", "celeste@email.com", '81dc9bdb52d04dc20036dbd8313ed055', 44444444, 2, 4, 2);
           
	INSERT INTO Tipo_Publicacion (descripcion)
	VALUES ("Periodistica"),
		   ("Revista");

	INSERT INTO Seccion (descripcion)
	VALUES ("Coronavirus"),
	       ("Politica"),
		   ("Economia"),
		   ("Policiales"),
		   ("Mundo"),
           ("Cultura"),
           ("Deportes"),
           ("Opinion"),
           ("Espectaculos"),
           ("Revista");

	INSERT INTO Publicacion (titulo, bajada, imagen, epigrafe_imagen, cuerpo, id_tipo_publicacion, id_seccion, id_usuario, autorizada, fecha)
	VALUES ("Caida del peso en la argentina", "En la actualidad la caída de la moneda nacional sorprende en muchos países del mundo, pero en la Argentina es cosa común", "economia-1.jpg", "Caida del peso en la argentina", 
    'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".',
    1, 3, 2, 1, "2020-01-01 01:00:00.000000"),
    
		   ("Así cuidan sus bolsillos los argentinos", "Pese a los sacudones los argentinos resisten a cualquier crisis", "economia-2.jpg", "Pese a los sacudones los argentinos resisten a cualquier crisis", 'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".',
           1, 3, 2, 1, "2020-01-02 01:00:00.000000"),
           
		   ("Se ampia la desigualdad económica", "Crece la desigualdad en el mundo consecuencia de la fuerte caida economica", "economia-3.jpg", "Crece la desigualdad en el mundo consecuencia de la fuerte caida economica", 'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".', 1, 3, 2, 1, "2020-01-03 01:00:00.000000"),
           
		   ("Situación de  la pandeia mundial", "La situación de  la pandeia mundial ha generado cambios en todos los aspectos de la vida humana", "covid-1.jpg", "La situación de  la pandeia mundial ha generado cambios en todos los aspectos de la vida humana", 
           'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".',
           1, 1, 2, 1, "2020-01-04 01:00:00.000000"),
           
           ("Anuncian estudios esperanzadores acerca del tratamiento ante el covid", "Recientes estudios de la organización de médicos internacionales ha presentado un estudio que podría cambiar el panorama actual", "covid-2.jpg", "Recientes estudios de la organización de médicos internacionales ha presentado un estudio que podría cambiar el panorama actual", 'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".', 1, 1, 2, 1, "2020-01-05 01:00:00.000000"),
           
		   ("Se refuerzan los controles", "Con los nuevos controles más estrictos se espera aplanar la curva de contagios", "covid-3.jpg", "Con los nuevos controles más estrictos se espera aplanar la curva de contagios", 
           'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".', 
           1, 1, 2, 1, "2020-01-06 01:00:00.000000"),
           
		   ("Se reanudan los deportes", "Muchos deportes se reanudan luego de meses sin actividad", "deportes-1.jpg", "Muchos deportes se reanudan luego de meses sin actividad", 
           'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".',
           1, 7, 2, 1, "2020-01-07 01:00:00.000000"),
           
		   ("Volver a entrenar", "Podrían abrirse las puertas de muchos clubes para retomar con los entrenamientos", "deportes-2.jpg", "Podrían abrirse las puertas de muchos clubes para retomar con los entrenamientos", 
           'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".', 
           1, 7, 2, 1, "2020-01-08 01:00:00.000000"),
           
		   ("Tribunas vacias", "A puertas cerradas, los partidos vuelven a disputarse aunque con sensaciones extrañas", "deportes-3.jpg", "A puertas cerradas, los partidos vuelven a disputarse aunque con sensaciones extrañas", 
           'Después de muchas dilaciones y de la ausencia de un plan específico, Nicolás Russo, presidente de Lanús y cercano a la conducción de Claudio Tapia (titular de la AFA), planteó las fechas para el regreso del fútbol: "Hay presiones y necesidades. En esta semana se cerrará el protocolo y, salvo una catástrofe, el 5 o 10 de agosto volverían los entrenamientos y en septiembre podemos estar jugando". Los últimos dos partidos oficiales se disputaron el lunes 16 de marzo, por la primera fecha de la Copa de la Superliga, con las victorias visitantes de Argentinos (1-0 a Lanús) y de Colón (3-1 a Rosario Central).En declaraciones al programa radial De una con Niembro, Russo reconoció que todavía no está claro el sistema de competencia: "Habrá que ver cómo se juega el torneo, si lo dividimos en zonas. Futbolistas Agremiados ya sabe que la actividad se puede extender hasta los últimos días de diciembre. La idea es también jugar la Copa Argentina".'
           , 1, 7, 2, 1, "2020-01-09 01:00:00.000000");

	INSERT INTO Tipo_Reaccion (descripcion)
	VALUES ("Tipo_Reaccion_1publicacion"),
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
