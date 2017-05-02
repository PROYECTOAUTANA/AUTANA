-- DROP TABLE categoria;

CREATE TABLE categoria
(
  id_categoria serial,
  categoria_nombre varchar(30),
  categoria_descripcion varchar(300),
  categoria_fecha_registro varchar(120),
  CONSTRAINT categoria_pkey PRIMARY KEY (id_categoria)
);

-- DROP TABLE usuario;

CREATE TABLE usuario
(
  id_usuario serial,
  usuario_cedula varchar(120),
  usuario_nombre varchar(120),
  usuario_apellido varchar(120),
  usuario_sexo int,
  usuario_telefono varchar(120),
  usuario_correo varchar(30),
  usuario_direccion varchar(120),
  usuario_usuario varchar(120),
  usuario_clave varchar(80),
  usuario_fecha_registro varchar(120),
  fk_categoria int,
  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario),
  CONSTRAINT fk_categoria FOREIGN KEY (fk_categoria)
      REFERENCES categoria (id_categoria) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


-- DROP TABLE public.departamento;

CREATE TABLE departamento
(
  id_departamento serial,
  departamento_nombre character varying(120),
  departamento_fecha_registro varchar(120),
  CONSTRAINT pnf_pkey PRIMARY KEY (id_departamento)
);

-- DROP TABLE usuario_departamento;

CREATE TABLE usuario_departamento
(
  id_usuario_departamento serial,
  fk_usuario int,
  fk_departamento int,
  usuario_departamento_fecha_registro varchar(120),
  CONSTRAINT usuario_departamento_pkey PRIMARY KEY (id_usuario_departamento),
  CONSTRAINT fk_departamento FOREIGN KEY (fk_departamento)
      REFERENCES departamento (id_departamento) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT usuario_departamento_fk_departamento_fkey FOREIGN KEY (fk_departamento)
      REFERENCES departamento (id_departamento) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- DROP TABLE rol;

CREATE TABLE rol
(
  id_rol serial,
  rol_nombre varchar(30),
  rol_descripcion varchar(30),
  rol_fecha_registro varchar(120),
  CONSTRAINT rol_pkey PRIMARY KEY (id_rol)
);

-- DROP TABLE usuario_rol;

CREATE TABLE usuario_rol
(
  id_usuario_rol serial,
  fk_usuario int,
  fk_rol int,
  usuario_rol_fecha_registro varchar(120),
  CONSTRAINT usuario_rol_pkey PRIMARY KEY (id_usuario_rol),
  CONSTRAINT usuario_rol_fk_rol_fkey FOREIGN KEY (fk_rol)
      REFERENCES rol (id_rol) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT usuario_rol_fk_usuario_fkey FOREIGN KEY (fk_usuario)
      REFERENCES usuario(id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


-- DROP TABLE modulo;

CREATE TABLE modulo
(
  id_modulo serial,
  modulo_nombre varchar(70),
  modulo_url varchar(120),
  modulo_fecha_registro varchar(120),
  CONSTRAINT modulo_pkey PRIMARY KEY (id_modulo)
);


-- DROP TABLE rol_modulo;

CREATE TABLE rol_modulo
(
  id_rol_modulo serial,
  fk_rol int,
  fk_modulo int,
  rol_modulo_fecha_registro varchar(120),
  CONSTRAINT rol_modulo_pkey PRIMARY KEY (id_rol_modulo),
  CONSTRAINT rol_modulo_fk_modulo_fkey FOREIGN KEY (fk_modulo)
      REFERENCES modulo (id_modulo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT rol_modulo_fk_rol_fkey FOREIGN KEY (fk_rol)
      REFERENCES rol (id_rol) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


-- DROP TABLE trabajo;

CREATE TABLE trabajo
(
  id_trabajo serial,
  trabajo_titulo varchar(120),
  trabajo_mension varchar(30),
  trabajo_fecha_presentacion varchar(30),
  trabajo_proceso varchar(50),
  trabajo_categoria_de_ascenso varchar(40),
  trabajo_resumen varchar(300),
  trabajo_fecha_registro varchar(120),
  CONSTRAINT trabajo_pkey PRIMARY KEY (id_trabajo)
);


-- DROP TABLE usuario_trabajo;

CREATE TABLE usuario_trabajo
(
  id_usuario_trabajo serial,
  fk_usuario int,
  fk_trabajo int,
  vinculo varchar(60),
  usuario_trabajo_fecha_registro varchar(120),
  CONSTRAINT usuario_trabajo_pkey PRIMARY KEY (id_usuario_trabajo),
  CONSTRAINT usuario_trabajo_fk_trabajo_fkey FOREIGN KEY (fk_trabajo)
      REFERENCES trabajo (id_trabajo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT usuario_trabajo_fk_usuario_fkey FOREIGN KEY (fk_usuario)
      REFERENCES usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


-- DROP TABLE fase;

CREATE TABLE fase
(
  id_fase serial,
  fase_nombre varchar(30),
  fase_fecha_registro varchar(120),
  CONSTRAINT fase_pkey PRIMARY KEY (id_fase)
);


-- DROP TABLE trabajo_fase;

CREATE TABLE trabajo_fase
(
  id_trabajo_fase serial,
  fk_fase int,
  fk_trabajo int,
  trabajo_fase_fecha_registro varchar(120),
  CONSTRAINT trabajo_fase_pkey PRIMARY KEY (id_trabajo_fase),
  CONSTRAINT fase_fk FOREIGN KEY (fk_fase)
      REFERENCES fase (id_fase) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION,
  CONSTRAINT trabajo_fk FOREIGN KEY (fk_trabajo)
      REFERENCES trabajo (id_trabajo) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION
);

-- DROP TABLE linea;

CREATE TABLE linea
(
  id_linea serial,
  linea_nombre varchar(60),
  linea_descripcion varchar(300),
  linea_fecha_registro varchar(120),
  CONSTRAINT linea_pkey PRIMARY KEY (id_linea)
);



-- DROP TABLE trabajo_linea;

CREATE TABLE trabajo_linea
(
  id serial,
  fk_linea int,
  fk_trabajo int,
  trabajo_linea_fecha_registro varchar(120),
  CONSTRAINT trabajo_linea_pkey PRIMARY KEY (id),
  CONSTRAINT linea_fk FOREIGN KEY (fk_linea)
      REFERENCES linea (id_linea) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION,
  CONSTRAINT trabajo_fk FOREIGN KEY (fk_trabajo)
      REFERENCES trabajo (id_trabajo) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION
);

INSERT INTO trabajo(trabajo_titulo,trabajo_mension,trabajo_fecha_presentacion,trabajo_proceso,trabajo_categoria_de_ascenso,trabajo_resumen,trabajo_fecha_registro) VALUES('trabajo_titulo','trabajo_mension','trabajo_fecha_presentacion','trabajo_proceso','trabajo_categoria_de_ascenso','trabajo_resumen','trabajo_fecha_registro');
INSERT INTO categoria(categoria_nombre, categoria_descripcion, categoria_fecha_registro)VALUES ('sin categoria', 'sin ninguna categoria el usuario no es docente','5345');
INSERT INTO usuario(usuario_cedula,usuario_nombre,usuario_apellido,usuario_sexo,usuario_telefono,usuario_correo,usuario_direccion,usuario_usuario,usuario_clave,usuario_fecha_registro,fk_categoria) VALUES('usuario_cedula','usuario_nombre','usuario_apellido',2,0416876564,'usuario_correo','usuario_direccion','admin',md5('admin'),'usuario_fecha_registro',1);
INSERT INTO rol(rol_nombre, rol_descripcion, rol_fecha_registro)VALUES ('administrador', 'control total del sistema','54353');
INSERT INTO usuario_rol(fk_usuario, fk_rol, usuario_rol_fecha_registro)VALUES (1, 1, 'fsdfdsf');
INSERT INTO fase(fase_nombre, fase_fecha_registro)VALUES ('fase1','fdfsdf');
INSERT INTO linea(linea_nombre, linea_descripcion, linea_fecha_registro)VALUES ('linea 1','linea 1','fsdfds');
INSERT INTO departamento(departamento_nombre,departamento_fecha_registro) VALUES('dpto 1','fsdfds');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('iniciar sesion','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('gestionar trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('gestionar reportes','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis tutorados','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis trabajos evaluados','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('sistema y seguridad','53454');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar usuario','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar rol','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar categoria','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar departamento','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar fase','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar linea','53454');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar usuarios','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar roles','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar categorias','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar departamentos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar fases','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar lineas','53454');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar usuario','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar rol','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar fase','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar categoria','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar departamento','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar linea','53454');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar usuario','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar rol','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar fase','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar categoria','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar departamento','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar linea','53454');

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('ver estatus','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('reporte general de trabajos','53454');
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('reporte general de usuarios','53454');


INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 1, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 2, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 3, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 4, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 5, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 6, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 7, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 8, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 9, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 10, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 11, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 12, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 13, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 14, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 15, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 16, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 17, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 18, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 19, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 20, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 21, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 22, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 23, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 24, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 25, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 26, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 27, '543553');
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 28, '543553');
