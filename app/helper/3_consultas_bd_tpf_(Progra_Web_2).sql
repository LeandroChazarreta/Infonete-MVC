USE UNLAM_Progra_Web_2_Trabajo_Practico_Final;

SELECT * 
FROM Usuario;

SELECT * 
FROM Usuario us JOIN Permiso pe ON us.id_permiso = pe.id_permiso
WHERE pe.descripcion = "Administrador";

SELECT * 
FROM Publicacion pub JOIN Tipo_Publicacion tipo_pub ON pub.id_tipo_publicacion = tipo_pub.id_tipo_publicacion
					 JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
WHERE sec.descripcion = "Opinion";

SELECT * 
FROM Publicacion;

