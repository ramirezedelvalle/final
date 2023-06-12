create database final

CREATE TABLE puestos (
    pue_cod SERIAL NOT NULL,
    pue_descr VARCHAR(200) NOT NULL,
    pue_suel DECIMAL(8,2) NOT NULL,
    pue_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY(pue_cod)
);

CREATE TABLE areas  ( 
	area_cod	SERIAL NOT NULL,
	area_descr	VARCHAR(200) NOT NULL,
    area_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY(area_cod)
)


CREATE TABLE empleados (
    emp_cod SERIAL NOT NULL,
    emp_nom VARCHAR(100) NOT NULL,
    emp_ape VARCHAR(100) NOT NULL,
    emp_dpi BIGINT CHECK (emp_dpi >= 1111111111111 AND emp_dpi <= 9999999999999) NOT NULL,
    emp_edad INTEGER CHECK (emp_edad >= 18 AND emp_edad <= 65) NOT NULL,
    emp_puesto_cod INTEGER NOT NULL,
    emp_sexo VARCHAR (100) NOT NULL,
    emp_area_cod INTEGER NOT NULL,
    emp_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY(emp_cod),
    FOREIGN KEY (emp_area_cod) REFERENCES areas(area_cod),
    FOREIGN KEY (emp_puesto_cod) REFERENCES puestos(pue_cod)
);

