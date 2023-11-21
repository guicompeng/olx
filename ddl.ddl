-- Gerado por Oracle SQL Developer Data Modeler 21.4.2.059.0838
--   em:        2023-11-10 16:20:31 BRT
--   site:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE SCHEMA IF NOT EXISTS `olx` DEFAULT CHARACTER SET utf8 ;
USE `olx` ;

CREATE TABLE anuncio (
    codigo             INTEGER NOT NULL,
    placa              VARCHAR(20) NOT NULL,
    usuario_cpf        VARCHAR(20) NOT NULL,
    localizacao_estado VARCHAR(2) NOT NULL,
    localizacao_cidade VARCHAR(50) NOT NULL,
    modelo_codigo_fipe VARCHAR(50) NOT NULL,
    km                 INTEGER NOT NULL,
    titulo             VARCHAR(50) NOT NULL,
    data_cadastro      DATE NOT NULL,
    ano_fab            INTEGER NOT NULL,
    ano_modelo         INTEGER NOT NULL,
    preco              FLOAT NOT NULL,
    status             VARCHAR(50)
);

ALTER TABLE anuncio
    ADD CONSTRAINT ANUNCIO_CK_STATUS
    CHECK (Status IN ('DISPONIVEL', 'INDISPONIVEL', 'VENDIDO'))
;
ALTER TABLE anuncio ADD CONSTRAINT anuncio_pk PRIMARY KEY ( codigo );

CREATE TABLE categoria (
    nome VARCHAR(50) NOT NULL
);

ALTER TABLE categoria ADD CONSTRAINT categoria_pk PRIMARY KEY ( nome );

CREATE TABLE foto (
    url            VARCHAR(200) NOT NULL,
    anuncio_codigo INTEGER NOT NULL,
    ordem          INTEGER NOT NULL
);

ALTER TABLE foto ADD CONSTRAINT foto_pk PRIMARY KEY ( url );

CREATE TABLE localizacao (
    estado VARCHAR(2) NOT NULL,
    cidade VARCHAR(50) NOT NULL
);

ALTER TABLE localizacao ADD CONSTRAINT localizacao_pk PRIMARY KEY ( estado,
                                                                    cidade );

CREATE TABLE marca (
    nome     VARCHAR(50)
     NOT NULL,
    logotipo VARCHAR(50)
--  ERROR: VARCHAR size not specified
     NOT NULL
);

ALTER TABLE marca ADD CONSTRAINT marca_pk PRIMARY KEY ( nome );

CREATE TABLE mensagem (
    data_hora             DATETIME NOT NULL,
    usuario_cpf           VARCHAR(20) NOT NULL,
    anuncio_codigo        INTEGER NOT NULL,
    texto                 VARCHAR(500) NOT NULL,
    enviado_pelo_vendedor CHAR(1)
);

ALTER TABLE mensagem
    ADD CONSTRAINT mensagem_pk PRIMARY KEY ( data_hora,
                                             usuario_cpf,
                                             anuncio_codigo );

CREATE TABLE modelo (
    codigo_fipe    VARCHAR(50) NOT NULL,
    nome           VARCHAR(50) NOT NULL,
    marca_nome     VARCHAR(50)
--  ERROR: VARCHAR size not specified
     NOT NULL,
    categoria_nome VARCHAR(50) NOT NULL
);

ALTER TABLE modelo ADD CONSTRAINT modelo_pk PRIMARY KEY ( codigo_fipe );

CREATE TABLE usuario (
    cpf             VARCHAR(20) NOT NULL,
    primeiro_nome   VARCHAR(50) NOT NULL,
    email           VARCHAR(100) NOT NULL,
    senha           VARCHAR(100) NOT NULL,
    telefone        VARCHAR(50) NOT NULL,
    sobrenome       VARCHAR(50) NOT NULL,
    data_cadastro   DATE NOT NULL,
    data_nascimento DATE NOT NULL
);

ALTER TABLE usuario ADD CONSTRAINT usuario_pk PRIMARY KEY ( cpf );

ALTER TABLE anuncio
    ADD CONSTRAINT anuncio_localizacao_fk FOREIGN KEY ( localizacao_estado,
                                                        localizacao_cidade )
        REFERENCES localizacao ( estado,
                                 cidade );

ALTER TABLE anuncio
    ADD CONSTRAINT anuncio_modelo_fk FOREIGN KEY ( modelo_codigo_fipe )
        REFERENCES modelo ( codigo_fipe );

ALTER TABLE anuncio
    ADD CONSTRAINT anuncio_usuario_fk FOREIGN KEY ( usuario_cpf )
        REFERENCES usuario ( cpf );

ALTER TABLE foto
    ADD CONSTRAINT foto_anuncio_fk FOREIGN KEY ( anuncio_codigo )
        REFERENCES anuncio ( codigo );

ALTER TABLE mensagem
    ADD CONSTRAINT mensagem_anuncio_fk FOREIGN KEY ( anuncio_codigo )
        REFERENCES anuncio ( codigo );

ALTER TABLE mensagem
    ADD CONSTRAINT mensagem_usuario_fk FOREIGN KEY ( usuario_cpf )
        REFERENCES usuario ( cpf );

ALTER TABLE modelo
    ADD CONSTRAINT modelo_categoria_fk FOREIGN KEY ( categoria_nome )
        REFERENCES categoria ( nome );

ALTER TABLE modelo
    ADD CONSTRAINT modelo_marca_fk FOREIGN KEY ( marca_nome )
        REFERENCES marca ( nome );



-- Relatório do Resumo do Oracle SQL Developer Data Modeler:
--
-- CREATE TABLE                             8
-- CREATE INDEX                             0
-- ALTER TABLE                             17
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
--
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
--
-- REDACTION POLICY                         0
--
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
--
-- ERRORS                                   4
-- WARNINGS                                 0
