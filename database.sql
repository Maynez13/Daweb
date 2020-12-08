/** creacion de la base datos **/

CREATE DATABASE artesanias 
CHARACTER SET utf8mb4 COLLATE
utf8mb4_spanish_cli;
 USE artesanias;

/** Permisos de usuario **/

GRANT ALL ON  artesanias.*TO
artesano@'localhost' IDENTIFIED BY 
'3l4rt4s4n0';

/** tabla clasificacion  **/

CREATE TABLE clasificacion
(id BIGINT AUTO_INCREMENT
,descripcion VARCHAR (50)
,padre  BIGINT DEFAULT 0
,CONSTRAINT pkClasifica PRIMARY KEY (id)
);

/** tabla especialidades **/

CREATE TABLE especialidades(
    id BIGINT AUTO_INCREMENT
    ,descripcion VARCHAR (50) NOT NULL 
    , CONSTRAINT pkespecialidad PRIMARY KEY (id)
     );

 /** tabla artesanos**/

 CREATE TABLE artesanos
 (id BIGINT AUTO_INCREMENT
 ,nombre VARCHAR (100) NOT NULL
 ,primerapellido VARCHAR (50) NOT NULL
 ,segundoapellido VARCHAR (50) NOT NULL
 ,domicilio VARCHAR (100)
 ,telefono VARCHAR (20)
 ,correo VARCHAR (100) UNIQUE
 ,CONSTRAINT pkartesano PRIMARY KEY id );

  /** tabla artesanoespecialidad**/

CREATE TABLE artesanoespecialidad(
    artesano_id BIGINT
    ,especialidad_id BIGINT
    ,CONSTRAINT pkartesanoespecialidad PRIMARY KEY (artesano_id, especialidad_id)
);

 /** tabla productos**/

 CREATE TABLE productos(
     id BIGINT AUTO_INCREMENT
     ,producto VARCHAR (100) not NULL
     ,descripcion TEXT 
     ,clasificacion_id BIGINT
     ,artesano_id BIGINT
     ,precio DOUBLE
     ,existencias INT DEFAULT 0
     ,CONSTRAINT pkproductos PRIMARY KEY (id)
     ,CONSTRAINT fkClasificaProducto FOREIGN KEY (clasificacion_id) REFERENCES clasificacion(id)
     ,CONSTRAINT fkArtesanoProdcuto  FOREIGN KEY (artesano_id)      REFERENCES artesanos(id)
 );

 /** tabla **/

 CREATE TABLE
