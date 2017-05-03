-- DROP TABLE categoria;

CREATE TABLE categoria
(
  id_categoria serial,
  categoria_nombre varchar(30),
  categoria_descripcion varchar(300),
  categoria_fecha_registro date,
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
  usuario_fecha_registro date,
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
  departamento_fecha_registro date,
  CONSTRAINT pnf_pkey PRIMARY KEY (id_departamento)
);

-- DROP TABLE usuario_departamento;

CREATE TABLE usuario_departamento
(
  id_usuario_departamento serial,
  fk_usuario int,
  fk_departamento int,
  usuario_departamento_fecha_registro date,
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
  rol_fecha_registro date,
  CONSTRAINT rol_pkey PRIMARY KEY (id_rol)
);

-- DROP TABLE usuario_rol;

CREATE TABLE usuario_rol
(
  id_usuario_rol serial,
  fk_usuario int,
  fk_rol int,
  usuario_rol_fecha_registro date,
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
  modulo_fecha_registro date,
  CONSTRAINT modulo_pkey PRIMARY KEY (id_modulo)
);


-- DROP TABLE rol_modulo;

CREATE TABLE rol_modulo
(
  id_rol_modulo serial,
  fk_rol int,
  fk_modulo int,
  rol_modulo_fecha_registro date,
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
  trabajo_fecha_registro date,
  CONSTRAINT trabajo_pkey PRIMARY KEY (id_trabajo)
);


-- DROP TABLE usuario_trabajo;

CREATE TABLE usuario_trabajo
(
  id_usuario_trabajo serial,
  fk_usuario int,
  fk_trabajo int,
  vinculo varchar(60),
  usuario_trabajo_fecha_registro date,
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
  fase_fecha_registro date,
  CONSTRAINT fase_pkey PRIMARY KEY (id_fase)
);


-- DROP TABLE trabajo_fase;

CREATE TABLE trabajo_fase
(
  id_trabajo_fase serial,
  fk_fase int,
  fk_trabajo int,
  trabajo_fase_fecha_registro date,
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
  linea_fecha_registro date,
  CONSTRAINT linea_pkey PRIMARY KEY (id_linea)
);



-- DROP TABLE trabajo_linea;

CREATE TABLE trabajo_linea
(
  id serial,
  fk_linea int,
  fk_trabajo int,
  trabajo_linea_fecha_registro date,
  CONSTRAINT trabajo_linea_pkey PRIMARY KEY (id),
  CONSTRAINT linea_fk FOREIGN KEY (fk_linea)
      REFERENCES linea (id_linea) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION,
  CONSTRAINT trabajo_fk FOREIGN KEY (fk_trabajo)
      REFERENCES trabajo (id_trabajo) MATCH FULL
      ON UPDATE CASCADE ON DELETE NO ACTION
);


-- DROP TABLE public.bitacora_trabajo;

CREATE TABLE bitacora_trabajo
(
  id_bitacora_trabajo serial,
  fk_usuario_gestor int,
  fk_trabajo int,
  fecha date,
  hora time,
  observacion varchar(220),
  CONSTRAINT bitacora_trabajo_pkey PRIMARY KEY (id_bitacora_trabajo),
  CONSTRAINT bitacora_trabajo_fk_trabajo_fkey FOREIGN KEY (fk_trabajo)
      REFERENCES trabajo (id_trabajo) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT bitacora_trabajo_fk_usuario_gestor_fkey FOREIGN KEY (fk_usuario_gestor)
      REFERENCES usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE bitacora_usuario(
id_bitacora_usuario serial,
fk_usuario int, 
fecha_de_entrada date, 
hora_de_entrada time,
fecha_de_salida date,
hora_de_salida time,
estado int,
primary key(id_bitacora_usuario),
foreign key(fk_usuario) references usuario(id_usuario)
);





INSERT INTO trabajo(trabajo_titulo,trabajo_mension,trabajo_fecha_presentacion,trabajo_proceso,trabajo_categoria_de_ascenso,trabajo_resumen,trabajo_fecha_registro) VALUES('trabajo_titulo','trabajo_mension','trabajo_fecha_presentacion','trabajo_proceso','trabajo_categoria_de_ascenso','trabajo_resumen',NOW());
INSERT INTO categoria(categoria_nombre, categoria_descripcion, categoria_fecha_registro)VALUES ('sin categoria', 'sin ninguna categoria el usuario no es docente',NOW());
INSERT INTO usuario(usuario_cedula,usuario_nombre,usuario_apellido,usuario_sexo,usuario_telefono,usuario_correo,usuario_direccion,usuario_usuario,usuario_clave,usuario_fecha_registro,fk_categoria) VALUES('usuario_cedula','usuario_nombre','usuario_apellido',2,0416876564,'usuario_correo','usuario_direccion','admin',md5('admin'),NOW(),1);
INSERT INTO rol(rol_nombre, rol_descripcion, rol_fecha_registro)VALUES ('administrador', 'control total del sistema',NOW());
INSERT INTO usuario_rol(fk_usuario, fk_rol, usuario_rol_fecha_registro)VALUES (1, 1, NOW());
INSERT INTO fase(fase_nombre, fase_fecha_registro)VALUES ('fase1',NOW());
INSERT INTO linea(linea_nombre, linea_descripcion, linea_fecha_registro)VALUES ('linea 1','linea 1',NOW());
INSERT INTO departamento(departamento_nombre,departamento_fecha_registro) VALUES('dpto 1',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('iniciar sesion',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('gestionar trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('gestionar reportes',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis tutorados',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('mis trabajos evaluados',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('sistema y seguridad',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar usuario',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar rol',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar categoria',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar departamento',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar fase',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('insertar linea',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar usuarios',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar roles',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar categorias',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar departamentos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar fases',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('listar lineas',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar usuario',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar rol',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar fase',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar categoria',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar departamento',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('editar linea',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar usuario',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar rol',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar fase',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar categoria',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar departamento',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('eliminar linea',NOW());

INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('ver estatus',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('reporte general de trabajos',NOW());
INSERT INTO modulo(modulo_nombre,modulo_fecha_registro)VALUES ('reporte general de usuarios',NOW());


INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 1, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 2, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 3, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 4, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 5, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 6, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 7, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 8, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 9, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 10, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 11, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 12, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 13, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 14, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 15, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 16, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 17, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 18, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 19, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 20, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 21, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 22, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 23, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 24, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 25, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 26, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 27, NOW());
INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro) VALUES (1, 28, NOW());
