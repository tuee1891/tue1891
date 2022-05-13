
Persona
	* Nombres			varchar 50
	* Apellidos			varchar 100
	* Fecha Nacimiento	Date
	* Documento			char 8
	* Altura			float
	* Sexo				enum (masculino, femenino,otros)
	* Celular			tinyint
	* Direccion			text
	* Telefono			tinyint

	
	
	
	create table personas (
	
		nombre varchar (50),
		apellidos varchar (100),
		fecha_nacimiento date,
		documento char (8),
		altura float (10.2),
		Sexo enum ('Masculino','Femenino', 'Otros'),
		celular tinyint (10),
		direcciones text,
		telefono tinyint (10)
	);
	
	SHOW TABLES;
	
	DROP TABLE personas;
    


	---------------------------------------------------------------------------------------------------------

	
CREATE TABLE alumnos(

	documento varchar(20),
	nombre varchar(50),
	apellido varchar(50),
	tipoDocumento enum("ci","pasaporte"),
	fechaNacimiento date
	PRIMARY KEY (documento)

);

SELECT * FROM alumnos;

INSERT INTO alumnos (documento,nombre,apellido,tipoDocumento,fechaNacimiento)
values ("44559966","Damian","Delgado","ci","1989_09_10");	

INSERT INTO alumnos (documento,nombre,apellido,tipoDocumento,fechaNacimiento)
values ("33776655","Alfredo","Imperial","ci","1991_05_07");	
	
INSERT alumnos SET
	documento = "9988548",
	nombre	  = "Javier",
	apellido = "Matorrales",
	tipoDocumento = "Pasaporte",
	fechaNacimiento = "1900-01-15";


INSERT INTO alumnos (documento,nombre,apellido,tipoDocumento,fechaNacimiento)
values ("33776655","Alfredo","Imperial","ci","1991_05_07");	

DELETE FROM alumnos;

--33776655
DELETE FROM  alumnos WHERE documento = "33776655" LIMIT 2;

INSERT alumnos SET
	documento = "34996652",
	nombre	  = "Mario",
	apellido = "Beledo",
	tipoDocumento = "Pasaporte",
	fechaNacimiento = "1990-02-11";

INSERT alumnos SET
	documento = "4885895",
	nombre	  = "Jose",
	apellido = "Montoya",
	tipoDocumento = "Pasaporte",
	fechaNacimiento = "1996-11-15";


INSERT alumnos SET
	documento = "49905967",
	nombre	  = "Gaston",
	apellido = "Morales",
	tipoDocumento = "Pasaporte",
	fechaNacimiento = "1900-01-15";


	
	
	
