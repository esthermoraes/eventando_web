-- DELETANDO AS TABELAS
-- drop table USUARIO, EVENTO_PRESENCIAL, EVENTO_ONLINE, EVENTO, CONVITE, LISTA_CONVIDADOS, LOCALIZACAO, TIPO_LOGRADOURO, BAIRRO, CIDADE, ESTADO, TIPO_CONTATO, buffet, plataforma, Favorita, Possui_bairro_cidade, Possui_cidade_estado, Possui_tipo_contato_evento, Tem_tipo_contato_usuario;

-- CREATE DAS TABELAS
CREATE TABLE USUARIO (
    nome varchar(100) NOT NULL,
    email varchar(250) UNIQUE NOT NULL,
    data_nasc date NOT NULL,
    senha text NOT NULL,
    id_usuario serial PRIMARY KEY,
    FK_ESTADO_id_estado int NOT NULL
);

CREATE TABLE EVENTO_PRESENCIAL (
    FK_buffet_buffet_PK int,
    FK_EVENTO_id_evento int PRIMARY KEY,
    FK_LOCALIZACAO_id_localizacao int NOT NULL
);

CREATE TABLE EVENTO_ONLINE (
    link text NOT NULL,
    FK_plataforma_plataforma_PK int NOT NULL,
    FK_EVENTO_id_evento int PRIMARY KEY
);

CREATE TABLE EVENTO (
    objetivo varchar(150) NOT NULL,
    data_prevista date NOT NULL,
    atracoes varchar(300),
    privacidade_restrita BOOL DEFAULT false,
    horario time NOT NULL,
    src_img text NOT NULL,
    nome varchar(100) NOT NULL,
    id_evento serial PRIMARY KEY,
    FK_USUARIO_id_usuario int NOT NULL
);

CREATE TABLE CONVITE (
    estilo varchar(50) NOT NULL,
    cor varchar(50) NOT NULL,
    src_img text NOT NULL,
    id_convite serial PRIMARY KEY,
    FK_EVENTO_id_evento int NOT NULL
);

CREATE TABLE LISTA_CONVIDADOS (
    nome_convidado varchar(100) NOT NULL,
    id_lista_convidados serial PRIMARY KEY,
    email_convidado varchar(250) NOT NULL,
    FK_CONVITE_id_convite int NOT NULL
);

CREATE TABLE LOCALIZACAO (
    numero int,
    logradouro varchar(300) NOT NULL,
    cep varchar(8) NOT NULL,
    id_localizacao serial PRIMARY KEY,
    FK_TIPO_LOGRADOURO_id_tipo_logradouro int NOT NULL,
    FK_BAIRRO_id_bairro int NOT NULL
);

CREATE TABLE TIPO_LOGRADOURO (
    tipo_logradouro varchar(50) NOT NULL UNIQUE,
    id_tipo_logradouro serial PRIMARY KEY
);

CREATE TABLE CIDADE (
    cidade varchar(150) NOT NULL UNIQUE,
    id_cidade serial PRIMARY KEY
);

CREATE TABLE BAIRRO (
    bairro varchar(150) NOT NULL UNIQUE,
    id_bairro serial PRIMARY KEY
);

CREATE TABLE ESTADO (
    estado varchar(2) NOT NULL UNIQUE,
    id_estado serial PRIMARY KEY
);

CREATE TABLE TIPO_CONTATO (
    id_tipo_contato serial PRIMARY KEY,
    tipo_contato varchar(150) NOT NULL UNIQUE
);

CREATE TABLE buffet (
    buffet_PK serial PRIMARY KEY,
    buffet varchar(300) NOT NULL
);

CREATE TABLE plataforma (
    plataforma_PK serial PRIMARY KEY,
    plataforma varchar(150) NOT NULL UNIQUE
);

CREATE TABLE Favorita (
    fk_EVENTO_id_evento int,
    fk_USUARIO_id_usuario int
);

CREATE TABLE POSSUI_BAIRRO_CIDADE (
    fk_BAIRRO_id_bairro int,
    fk_CIDADE_id_cidade int
);

CREATE TABLE POSSUI_CIDADE_ESTADO (
    fk_CIDADE_id_cidade int,
    fk_ESTADO_id_estado int
);

CREATE TABLE POSSUI_TIPO_CONTATO_EVENTO (
    fk_TIPO_CONTATO_id_tipo_contato int,
    fk_EVENTO_id_evento int,
    contato varchar(250) NOT NULL
);

CREATE TABLE TEM_TIPO_CONTATO_USUARIO (
    fk_USUARIO_id_usuario int,
    fk_TIPO_CONTATO_id_tipo_contato int,
    telefone varchar(12) NOT NULL
);

-- ALTER DAS TABELAS
ALTER TABLE USUARIO ADD CONSTRAINT FK_USUARIO_2
    FOREIGN KEY (FK_ESTADO_id_estado)
    REFERENCES ESTADO (id_estado)
    ON DELETE RESTRICT;
 
ALTER TABLE EVENTO_PRESENCIAL ADD CONSTRAINT FK_EVENTO_PRESENCIAL_2
    FOREIGN KEY (FK_buffet_buffet_PK)
    REFERENCES buffet (buffet_PK)
    ON DELETE NO ACTION;
 
ALTER TABLE EVENTO_PRESENCIAL ADD CONSTRAINT FK_EVENTO_PRESENCIAL_3
    FOREIGN KEY (FK_EVENTO_id_evento)
    REFERENCES EVENTO (id_evento)
    ON DELETE CASCADE;
 
ALTER TABLE EVENTO_PRESENCIAL ADD CONSTRAINT FK_EVENTO_PRESENCIAL_4
    FOREIGN KEY (FK_LOCALIZACAO_id_localizacao)
    REFERENCES LOCALIZACAO (id_localizacao)
    ON DELETE RESTRICT;
 
ALTER TABLE EVENTO_ONLINE ADD CONSTRAINT FK_EVENTO_ONLINE_2
    FOREIGN KEY (FK_plataforma_plataforma_PK)
    REFERENCES plataforma (plataforma_PK)
    ON DELETE NO ACTION;
 
ALTER TABLE EVENTO_ONLINE ADD CONSTRAINT FK_EVENTO_ONLINE_3
    FOREIGN KEY (FK_EVENTO_id_evento)
    REFERENCES EVENTO (id_evento)
    ON DELETE CASCADE;
 
ALTER TABLE EVENTO ADD CONSTRAINT FK_EVENTO_2
    FOREIGN KEY (FK_USUARIO_id_usuario)
    REFERENCES USUARIO (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE CONVITE ADD CONSTRAINT FK_CONVITE_2
    FOREIGN KEY (FK_EVENTO_id_evento)
    REFERENCES EVENTO (id_evento)
    ON DELETE CASCADE;
 
ALTER TABLE LISTA_CONVIDADOS ADD CONSTRAINT FK_LISTA_CONVIDADOS_2
    FOREIGN KEY (FK_CONVITE_id_convite)
    REFERENCES CONVITE (id_convite)
    ON DELETE CASCADE;
 
ALTER TABLE LOCALIZACAO ADD CONSTRAINT FK_LOCALIZACAO_2
    FOREIGN KEY (FK_TIPO_LOGRADOURO_id_tipo_logradouro)
    REFERENCES TIPO_LOGRADOURO (id_tipo_logradouro)
    ON DELETE CASCADE;
 
ALTER TABLE LOCALIZACAO ADD CONSTRAINT FK_LOCALIZACAO_3
    FOREIGN KEY (FK_BAIRRO_id_bairro)
    REFERENCES BAIRRO (id_bairro)
    ON DELETE CASCADE;
 
ALTER TABLE Favorita ADD CONSTRAINT FK_Favorita_1
    FOREIGN KEY (fk_EVENTO_id_evento)
    REFERENCES EVENTO (id_evento)
    ON DELETE SET NULL;
 
ALTER TABLE Favorita ADD CONSTRAINT FK_Favorita_2
    FOREIGN KEY (fk_USUARIO_id_usuario)
    REFERENCES USUARIO (id_usuario)
    ON DELETE SET NULL;
 
ALTER TABLE Possui_bairro_cidade ADD CONSTRAINT FK_Possui_1
    FOREIGN KEY (fk_BAIRRO_id_bairro)
    REFERENCES BAIRRO (id_bairro)
    ON DELETE RESTRICT;
 
ALTER TABLE Possui_cidade_estado ADD CONSTRAINT FK_Possui_2
    FOREIGN KEY (fk_CIDADE_id_cidade)
    REFERENCES CIDADE (id_cidade)
    ON DELETE RESTRICT;
 
ALTER TABLE Possui_cidade_estado ADD CONSTRAINT FK_Possui_5
    FOREIGN KEY (fk_ESTADO_id_estado)
    REFERENCES ESTADO (id_estado)
    ON DELETE RESTRICT;
 
ALTER TABLE Possui_tipo_contato_evento ADD CONSTRAINT FK_Possui_6
    FOREIGN KEY (fk_TIPO_CONTATO_id_tipo_contato)
    REFERENCES TIPO_CONTATO (id_tipo_contato)
    ON DELETE SET NULL;
 
ALTER TABLE Possui_tipo_contato_evento ADD CONSTRAINT FK_Possui_4
    FOREIGN KEY (fk_EVENTO_id_evento)
    REFERENCES EVENTO (id_evento)
    ON DELETE SET NULL;
 
ALTER TABLE Tem_tipo_contato_usuario ADD CONSTRAINT FK_Tem_1
    FOREIGN KEY (fk_USUARIO_id_usuario)
    REFERENCES USUARIO (id_usuario)
    ON DELETE RESTRICT;

ALTER TABLE Tem_tipo_contato_usuario ADD CONSTRAINT FK_Tem_2
    FOREIGN KEY (fk_TIPO_CONTATO_id_tipo_contato)
    REFERENCES TIPO_CONTATO (id_tipo_contato)
    ON DELETE SET NULL;

-- INSERÇÃO DOS DADOS NAS TABELAS
INSERT INTO ESTADO (estado) VALUES
    ('AC'), 
    ('AL'), 
    ('AP'), 
    ('AM'),
    ('BA'), 
    ('CE'),
    ('DF'),
    ('ES'),
    ('GO'),
    ('MA'),
    ('MG'),
    ('MS'),
    ('MT'),
    ('PA'),
    ('PB'),
    ('PN'),
    ('PE'),
    ('PI'),
    ('RJ'),
    ('RN'),
    ('RS'),
    ('RO'),
    ('RR'),
    ('SC'),
    ('SP'),
    ('SE'),
    ('TO');
    
INSERT INTO plataforma (plataforma) VALUES
    ('Google Meet'),
    ('Microsoft Teams'),
    ('Zoom'),
    ('Youtube'),
    ('Instagram'),
    ('Discord');

INSERT INTO TIPO_CONTATO (tipo_contato) VALUES
    ('E-mail'),
    ('Telefone'),
    ('Facebook'),
    ('Instagram'),
    ('Tik Tok');

INSERT INTO TIPO_LOGRADOURO (tipo_logradouro) VALUES
    ('Rodovia'),
    ('Avenida'),
    ('Alameda'),
    ('Praça'),
    ('Rua'),
    ('Passarela'),
    ('Vila');