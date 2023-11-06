-- DELETANDO AS TABELAS
-- drop table USUARIO, EVENTO_PRESENCIAL, EVENTO_ONLINE, EVENTO, CONVITE, LISTA_CONVIDADOS, LOCALIZACAO, TIPO_LOGRADOURO, BAIRRO, CIDADE, ESTADO, TIPO_CONTATO, buffet, plataforma, Favorita, Possui_bairro_cidade, Possui_cidade_estado, Possui_tipo_contato_evento, Tem_tipo_contato_usuario;

-- CREATE DAS TABELAS
CREATE TABLE USUARIO (
    nome varchar (90) NOT NULL,
    email varchar(150) UNIQUE NOT NULL,
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
    link varchar (500) NOT NULL,
    FK_plataforma_plataforma_PK int NOT NULL,
    FK_EVENTO_id_evento int PRIMARY KEY
);

CREATE TABLE EVENTO (
    objetivo varchar (255) NOT NULL,
    data_prevista date NOT NULL,
    atracoes varchar (300),
    privacidade_restrita BOOL DEFAULT false,
    horario time NOT NULL,
    src_img text NOT NULL,
    nome varchar(100) NOT NULL,
    id_evento serial PRIMARY KEY,
    FK_USUARIO_id_usuario int NOT NULL
);

CREATE TABLE CONVITE (
    estilo varchar (20) NOT NULL,
    cores varchar (15) NOT NULL,
    id_convite serial PRIMARY KEY,
    FK_EVENTO_id_evento int NOT NULL
);

CREATE TABLE LISTA_CONVIDADOS (
    nome_convidado varchar (90) NOT NULL UNIQUE,
    id_lista_convidados serial PRIMARY KEY,
    email_convidado varchar(150) NOT NULL,
    FK_CONVITE_id_convite int NOT NULL
);

CREATE TABLE LOCALIZACAO (
    numero int,
    logradouro varchar(250) NOT NULL,
    cep varchar(9) NOT NULL,
    id_localizacao serial PRIMARY KEY,
    FK_TIPO_LOGRADOURO_id_tipo_logradouro int NOT NULL,
    FK_BAIRRO_id_bairro int NOT NULL
);

CREATE TABLE TIPO_LOGRADOURO (
    descricao varchar(50) NOT NULL UNIQUE,
    id_tipo_logradouro serial PRIMARY KEY
);

CREATE TABLE CIDADE (
    descricao varchar(100) NOT NULL UNIQUE,
    id_cidade serial PRIMARY KEY
);

CREATE TABLE BAIRRO (
    descricao varchar(100) NOT NULL UNIQUE,
    id_bairro serial PRIMARY KEY
);

CREATE TABLE ESTADO (
    descricao varchar(2) NOT NULL UNIQUE,
    id_estado serial PRIMARY KEY
);

CREATE TABLE TIPO_CONTATO (
    id_tipo_contato serial PRIMARY KEY,
    contato varchar(50) NOT NULL UNIQUE
);

CREATE TABLE buffet (
    buffet_PK serial PRIMARY KEY,
    buffet varchar (100) NOT NULL
);

CREATE TABLE plataforma (
    plataforma_PK serial PRIMARY KEY,
    plataforma varchar(50) NOT NULL UNIQUE
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
    descricao varchar(150) NOT NULL
);

CREATE TABLE TEM_TIPO_CONTATO_USUARIO (
    fk_USUARIO_id_usuario int,
    fk_TIPO_CONTATO_id_tipo_contato int,
    descricao varchar (150) NOT NULL
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
 
/*ALTER TABLE Possui_bairro_cidade ADD CONSTRAINT FK_Possui_3
    FOREIGN KEY (fk_CIDADE_id_cidade)
    REFERENCES CIDADE (id_cidade)
    ON DELETE RESTRICT;*/
 
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
INSERT INTO ESTADO (descricao) VALUES
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

INSERT INTO USUARIO (nome, email, data_nasc, senha, FK_ESTADO_id_estado) VALUES
    ('Tiago Rosa', 'tiagorosa@gmail.com', '1981-11-12', 'tiaguin123', 6),
    ('Maria Souza', 'mariasouza@gmail.com', '1985-10-20', 'abc123', 2),
    ('Pedro Santos', 'pedrosantos@gmail.com','1992-07-01', '123456', 3),
    ('Ana Oliveira', 'anaoliveira@gmail.com', '1988-02-12', 'senha456', 4),
    ('Carlos Rodrigues','carlosrodrigues@gmail.com',  '1995-09-30', 'abc456', 5),
    ('Juliana Costa', 'julianacosta@gmail.com', '1993-04-18', 'senha789', 1),
    ('Lucas Almeida', 'lucasalmeida@gmail.com', '1991-12-05', '123abc', 3),
    ('Camila Santos', 'camilasantos@gmail.com', '1987-06-23', 'senha987', 2),
    ('Fernando Lima', 'fernandolima@gmail.com', '1994-03-11', 'abc789', 4),
    ('Amanda Ferreira', 'amandaferreira@gmail.com', '1996-08-09', '123senha', 5),
    ('Rodrigo Sousa', 'rodrigosousa@gmail.com', '1990-11-25', 'senha123', 1),
    ('Isabela Silva','isabelasilva@gmail.com',  '1985-07-14', 'abc123', 2),
    ('Thiago Costa', 'tiagocosta@gmail.com', '1993-02-01', 'senha456', 3),
    ('Letícia Oliveira','leticiaoliveira@gmail.com', '1989-09-18', 'abc456', 4),
    ('Gustavo Rodrigues', 'gustavorodrigues@gmail.com', '1995-04-30', 'senha789', 5),
    ('Patrícia Almeida','patriciaalmeida@gmail.com',  '1991-11-12', '123abc', 1),
    ('Rafaela Santos', 'rafaelasantos@gmail.com', '1988-05-29', 'senha987', 2),
    ('Diego Lima', 'diegolima@gmail.com', '1994-01-15', 'abc789', 3),
    ('Renata Ferreira', 'renataferreira@gmail.com',  '1996-06-03', '123senha', 4),
    ('Luiz Sousa', 'luizsouza@gmail.com', '1990-10-17', 'senha123', 5),
    ('Mariana Silva', 'marianasilva@gmail.com', '1985-06-06', 'abc123', 1),
    ('Marcelo Costa', 'marcelocosta@gmail.com', '1993-01-24', 'senha456', 2),
    ('Larissa Oliveira', 'larissaoliveira@gmail.com', '1989-08-11', 'abc456', 3),
    ('Victor Rodrigues', 'victorodrigues@gmail.com', '1995-03-29', 'senha789', 4),
    ('Carolina Almeida','carolinalmeida@gmail.com', '1991-10-10', '123abc', 5),
    ('João Silva', 'joaosilva@gmail.com', '1990-05-15', 'senha123', 6), 
    ('Maria Santos', 'marisouza@gmail.com', '1985-09-20', 'abcde123', 7), 
    ('Pedro Almeida', 'pedrinhosant@gmail.com', '1992-07-10', 'senha456', 8), 
    ('Ana Costa','anaaoliv@gmail.com', '1998-01-03', 'abc123', 9), 
    ('Carlos Oliveira', 'carlinr@gmail.com', '1987-11-25', 'senha789', 10),
    ('Mariana Pereira', 'marianap@gmail.com', '1995-04-18', '123456', 11), 
    ('Fernando Santos', 'fernandosantos@gmail.com', '1991-08-12', 'senha321', 12), 
    ('Lúcia Rodrigues', 'luciarodrigues@gmail.com', '1984-06-27', '654321', 13), 
    ('Rafaela Mendes', 'rafaelamendes@gmail.com', '1997-03-08', 'senha987', 14), 
    ('Gabriel Alves', 'gabrielalves@gmail.com', '1993-12-01', 'abcxyz', 15),
    ('Laura Costa', 'lauracosta@gmail.com', '1990-05-15', 'senha123', 16),
    ('Gabriel Silva', 'gabrielsilva@gmail.com', '1985-09-20', 'abcde123', 17),
    ('Carolina Almeida', 'carolinaalmeida@gmail.com', '1992-07-10', 'senha456', 18),
    ('Lucas Oliveira', 'lucasoliveira@gmail.com', '1998-01-03', 'abc123', 19),
    ('Mariana Santos', 'marianasantos@gmail.com', '1987-11-25', 'senha789', 20),
    ('Rafael Pereira', 'rafelpereira@gmail.com', '1995-04-18', '123456', 21),
    ('Amanda Rodrigues', 'amandarodrigues@gmail.com', '1991-08-12', 'senha321', 22),
    ('Bruno Mendes', 'brunomendes@gmail.com', '1984-06-27', '654321', 23),
    ('Isabela Fernandes', 'isabelafernandes@gmail.com', '1997-03-08', 'senha987', 24),
    ('Pedro Alves', 'pealves@gmail.com', '1993-12-01', 'abcxyz', 25),
    ('Sophia Martins', 'sophiam@gmail.com', '1994-02-28', 'senha789', 26),
    ('Leonardo Rocha', 'leozinrocha@gmail.com', '1988-10-05', 'abc123', 27);
    
INSERT INTO plataforma (plataforma) VALUES
    ('Google Meet'),
    ('Zoom'),
    ('Microsoft Teams'),
    ('Discord');

INSERT INTO buffet (buffet) VALUES
    ('Buffet A'),
    ('Buffet B'),
    ('Buffet C'),
    ('Buffet D'),
    ('Buffet E'),
    ('Buffet F'),
    ('Buffet G'),
    ('Buffet H'),
    ('Buffet I'),
    ('Buffet J'),
    ('Buffet K'),
    ('Buffet L'),
    ('Buffet M');

INSERT INTO TIPO_CONTATO (contato) VALUES
    ('E-mail'),
    ('Telefone'),
    ('Facebook'),
    ('Instagram'),
    ('Tik Tok');
        
INSERT INTO CIDADE (descricao) VALUES 
    ('Rio Branco'),
    ('Maceió'), 
    ('Macapá'),
    ('Manaus'),
    ('Salvador'),
    ('Fortaleza'),
    ('Brasília'), 
    ('Vitória'), 
    ('Goiânia'),
    ('São Luís'),
    ('Cuiabá'), 
    ('Campo Grande'), 
    ('Belo Horizonte'),
    ('Belém'), 
    ('João Pessoa'), 
    ('Curitiba'),
    ('Recife'), 
    ('Teresina'),
    ('Rio de Janeiro'),
    ('Natal'),
    ('Porto Alegre'), 
    ('Porto Velho'), 
    ('Boa Vista'), 
    ('Florianópolis'), 
    ('São Paulo'),
    ('Aracaju'), 
    ('Palmas');

INSERT INTO BAIRRO (descricao) VALUES
    ('Areial'), 
    ('Estação Experimental'),
    ('Residencial Ouricuri'),
    ('Ponta Verde'),
    ('Pajuçara'), 
    ('Farol'),
    ('Central'), 
    ('Buritizal'), 
    ('Trem'),
    ('Centro'), 
    ('Cidade Nova'), 
    ('Adrianópolis'),
    ('Barra'), 
    ('Itapuã'), 
    ('Rio Vermelho'),
    ('Papicu'), 
    ('Aldeota'), 
    ('Meireles'),
    ('Asa Sul'), 
    ('Asa Norte'), 
    ('Lago Sul'),
    ('Jardim Camburi'), 
    ('Jardim da Penha'), 
    ('Praia do Canto'),
    ('Setor Bueno'), 
    ('Setor Marista'), 
    ('Setor Oeste'),
    ('Calhau'), 
    ('Cohama'), 
    ('Renascença'),
    ('Centro Norte'), 
    ('Araés'), 
    ('Bosque da Saúde'),
    ('Itanhangá'), 
    ('Jardim dos Estados'), 
    ('Tiradentes'),
    ('Savassi'), 
    ('Funcionários'), 
    ('Lourdes'),
    ('Nazaré'), 
    ('Batista Campos'),
    ('Marco'),
    ('Tambaú'),
    ('Manaíra'), 
    ('Bessa'),
    ('Portão'),
    ('Batel'),
    ('Água Verde'),
    ('Boa Viagem'), 
    ('Pina'), 
    ('Casa Forte'),
    ('Garupi'), 
    ('São Cristóvão'), 
    ('Buenos Aires'),
    ('Copacabana'), 
    ('Ipanema'), 
    ('Botafogo'),
    ('Ponta Negra'), 
    ('Lagoa Nova'), 
    ('Cidade Alta'),
    ('Restinga'),
    ('Moinhos de Vento'),
    ('Bela Vista'),
    ('Arigolândia'), 
    ('Caiari'), 
    ('Olaria'),
    ('Mecejana'),
    ('São Francisco'),
    ('Cauamé'),
    ('José Mendes'),
    ('Trindade'), 
    ('Itacorubi'),
    ('Pinheiros'),
    ('Moema'),
    ('Vila Mariana'),
    ('América'), 
    ('Atalaia'),
    ('Grageru'),
    ('Plano Diretor Sul'),
    ('Plano Diretor Norte'), 
    ('Jardim Aureny III');

INSERT INTO TIPO_LOGRADOURO (descricao) VALUES
    ('Rodovia'),
    ('Avenida'),
    ('Alameda'),
    ('Praça'),
    ('Rua'),
    ('Passarela'),
    ('Vila');

INSERT INTO EVENTO (objetivo, data_prevista, atracoes, privacidade_restrita, horario, src_img, nome, FK_USUARIO_id_usuario) VALUES
    ('Conferência', '2023-06-15', 'Palestrante X, Palestrante Y', TRUE, '09:00','logo.png', 'Conferência de Tecnologia', 25),
    ('Casamento', '2023-07-20', 'Cerimônia, Banda Z', FALSE, '17:00','logo.png', 'Casamento de João e Maria' , 2),
    ('Workshop', '2023-08-10', 'Oficina de Fotografia', TRUE, '14:00','logo.png', 'Workshop de Fotografia',  3),
    ('Festival', '2023-09-05', 'Bandas A, B, C', FALSE, '16:00','logo.png', 'Festival de Música',  4),
    ('Confraternização', '2023-10-15', 'Amigo Secreto', TRUE, '19:30','logo.png', 'Confraternização de Fim de Ano', 5),
    ('Palestra', '2023-11-20', 'Palestrante D', FALSE, '15:30','logo.png', 'Palestra de Empreendedorismo',6),
    ('Feira', '2023-12-10', 'Expositores, Stands', TRUE, '10:00','logo.png', 'Feira de Negócios', 7),
    ('Encontro', '2023-06-15', 'Networking', FALSE, '17:00','logo.png', 'Encontro de Profissionais', 8),
    ('Formatura', '2023-07-20', 'Cerimônia, Baile', TRUE, '20:00','logo.png', 'Formatura da Turma X',  9),
    ('Desfile', '2023-08-10', 'Modelos, Passarela', FALSE, '14:30','logo.png', 'Desfile de Moda',  10),
    ('Seminário', '2023-09-05', 'Palestrante E, Palestrante F', TRUE, '09:30','logo.png', 'Seminário de Marketing',  11),
    ('Show', '2023-10-15', 'Artista G', FALSE, '21:00','logo.png', 'Show ao Vivo',12),
    ('Inauguração', '2023-11-20', 'Cerimônia, Coquetel', TRUE, '18:00','logo.png', 'Inauguração da Loja',13),
    ('Concerto', '2023-12-10', 'Orquestra H', FALSE, '20:30','logo.png', 'Concerto Clássico', 14),
    ('Convenção', '2023-06-15', 'Palestrante I, Palestrante J', TRUE, '10:00','logo.png', 'Convenção Empresarial', 15),
    ('Feijoada', '2023-07-20', 'Samba, Roda de Samba', FALSE, '12:00','logo.png', 'Feijoada com Samba',16),
    ('Exposição', '2023-08-10', 'Obras de Arte', TRUE, '15:00','logo.png', 'Exposição de Arte Contemporânea', 17),
    ('Congresso', '2023-09-05', 'Palestrante K, Palestrante L', FALSE, '09:00','logo.png', 'Congresso de Medicina', 18),
    ('Festa da polenta', '2023-10-15', 'Facilitador M', TRUE, '14:00','logo.png', 'Festa da polenta', 19),
    ('Semana Cultural', '2023-11-20', 'Diversas Atrações', FALSE, '16:00','logo.png', 'Semana Cultural da Cidade',20),
    ('Simpósio', '2023-12-10', 'Palestrante N, Palestrante O', TRUE, '09:30','logo.png', 'Simpósio de Ciência', 21),
    ('Festa do Vinho', '2023-07-20', 'Facilitador Q', TRUE, '14:30','logo.png', 'Festa do Vinho', 22),
    ('Festa do morango', '2023-07-20', 'Facilitador Q', TRUE, '14:30','logo.png', 'Festa do morango', 23),
    ('Noivado da Lorena', '2023-08-10', 'Palestrante R', FALSE, '18:00','logo.png', 'Noivado da Lorena',  24),
    ('Entrega do TCC', '2023-12-13', 'Eventando', TRUE, '21:00','logo.png', 'Entrega do TCC',  1),
    ('Apresentação de Produto', '2023-06-15', 'Atração A', FALSE, '15:00','logo.png', 'Evento Presencial 1', 26),
    ('Lançamento de Serviço', '2023-07-20', 'Atração B', TRUE, '18:30','logo.png', 'Evento Presencial 2', 27),
    ('Conferência de Negócios', '2023-08-10', 'Atração C', FALSE, '11:00','logo.png', 'Evento Presencial 3', 28),
    ('Workshop de Capacitação', '2023-09-05', 'Atração D', TRUE, '14:30','logo.png', 'Evento Presencial 4', 29),
    ('Palestra Motivacional', '2023-10-15', 'Atração E', FALSE, '16:00','logo.png', 'Evento Presencial 5', 30),
    ('Congresso Científico', '2023-11-20', 'Atração F', TRUE, '19:00','logo.png', 'Evento Presencial 6', 31),
    ('Seminário de Tecnologia', '2023-12-10', 'Atração G', FALSE, '12:30','logo.png', 'Evento Presencial 7', 32),
    ('Feira de Exposição', '2024-01-15', 'Atração H', TRUE, '15:30','logo.png', 'Evento Presencial 8', 33),
    ('Encontro de Networking', '2024-02-05', 'Atração I', FALSE, '10:00','logo.png', 'Evento Presencial 9', 34),
    ('Convenção de Vendas', '2024-03-20', 'Atração J', TRUE, '13:30','logo.png', 'Evento Presencial 10', 35),
    ('Workshop de Marketing', '2024-04-10', 'Atração K', FALSE, '16:30','logo.png', 'Evento Presencial 11', 36),
    ('Fórum de Debate', '2024-05-15', 'Atração L', TRUE, '19:30','logo.png', 'Evento Presencial 12', 37),
    ('Palestra Educativa', '2024-06-05', 'Atração M', FALSE, '11:30','logo.png', 'Evento Presencial 13', 38),
    ('Conferência de Design', '2024-07-10', 'Atração N', TRUE, '14:30','logo.png', 'Evento Presencial 14', 39),
    ('Simpósio de Saúde', '2024-08-15', 'Atração O', FALSE, '17:00','logo.png', 'Evento Presencial 15', 40);

INSERT INTO EVENTO_ONLINE (link, FK_plataforma_plataforma_PK, FK_EVENTO_id_evento) VALUES
    ('https://meet.com/evento1', 1, 26),
    ('https://zoom.com/evento2', 2, 27),
    ('https://discord.com/evento3', 3, 28),
    ('https://teams.com/evento4', 4, 29),
    ('https://meet.com/evento5', 1, 30),
    ('https://zoom.com/evento6', 2, 31),
    ('https://discord.com/evento7', 3, 32),
    ('https://teams.com/evento8', 4, 33),
    ('https://meet.com/evento9', 1, 34),
    ('https://zoom.com/evento10', 2, 35),
    ('https://discord.com/evento11', 3, 36),
    ('https://teams.com/evento12', 4, 37),
    ('https://meet.com/evento13', 1, 38),
    ('https://zoom.com/evento14', 2, 39),
    ('https://discord.com/evento15', 3, 40);

INSERT INTO CONVITE (estilo, cores, FK_EVENTO_id_evento) VALUES
    ('Clássico', 'Branco', 1),
    ('Rústico', 'Marrom', 2),
    ('Moderno', 'Preto', 3),
    ('Floral', 'Rosa', 4),
    ('Minimalista', 'Branco', 5),
    ('Elegante', 'Dourado', 6),
    ('Divertido', 'Colorido', 7),
    ('Vintage', 'Bege', 8),
    ('Romântico', 'Vermelho', 9),
    ('Chique', 'Prata', 10),
    ('Abstrato', 'Azul', 11),
    ('Geométrico', 'Amarelo', 12),
    ('Luxuoso', 'Roxo', 13),
    ('Boho', 'Verde', 14),
    ('Clássico', 'Branco', 15),
    ('Rústico', 'Marrom', 16),
    ('Moderno', 'Preto', 17),
    ('Floral', 'Rosa', 18),
    ('Minimalista', 'Branco', 19),
    ('Elegante', 'Dourado', 20),
    ('Divertido', 'Colorido', 21),
    ('Vintage', 'Bege', 22),
    ('Romântico', 'Vermelho', 23),
    ('Chique', 'Prata', 24),
    ('Abstrato', 'Azul', 25),
    ('Geométrico', 'Amarelo', 26),
    ('Luxuoso', 'Roxo', 27),
    ('Boho', 'Verde', 28),
    ('Clássico', 'Branco', 29),
    ('Rústico', 'Marrom', 30),
    ('Moderno', 'Preto', 31),
    ('Floral', 'Rosa', 32),
    ('Minimalista', 'Branco', 33),
    ('Elegante', 'Dourado', 34),
    ('Divertido', 'Colorido', 35),
    ('Vintage', 'Bege', 36),
    ('Romântico', 'Vermelho', 37),
    ('Chique', 'Prata', 38),
    ('Abstrato', 'Azul', 39),
    ('Geométrico', 'Amarelo', 40);

INSERT INTO LISTA_CONVIDADOS (nome_convidado, email_convidado, FK_CONVITE_id_convite) VALUES
    ('João Silva', 'joao.silva@example.com', 1),
    ('Maria Santos', 'maria.santos@example.com', 1),
    ('Pedro Oliveira', 'pedro.oliveira@example.com', 1),
    ('Ana Pereira', 'ana.pereira@example.com', 1),
    ('Carlos Sousa', 'carlos.sousa@example.com', 1),
    ('Mariana Costa', 'mariana.costa@example.com',2),
    ('Fernando Almeida', 'fernando.almeida@example.com', 2),
    ('Sandra Ferreira', 'sandra.ferreira@example.com', 2),
    ('Ricardo Santos', 'ricardo.santos@example.com', 2),
    ('Isabela Lima', 'isabela.lima@example.com', 2),
    ('Gustavo Gomes', 'gustavo.gomes@example.com', 3),
    ('Laura Oliveira', 'laura.oliveira@example.com', 3),
    ('Rafaella Pereira', 'rafaela.pereira@example.com', 3),
    ('Jorge Sousa', 'jorge.sousa@example.com', 3),
    ('Lívia Costa', 'livia.costa@example.com', 3),
    ('Eduardo Almeida', 'eduardo.almeida@example.com', 4),
    ('Carolina Ferreira', 'carolina.ferreira@example.com', 4),
    ('Antônio Silva', 'antonio.silva@example.com', 4),
    ('Catarina Santos', 'catarina.santos@example.com', 4),
    ('Daniel Oliveira', 'daniel.oliveira@example.com', 4),
    ('Vitória Pereira', 'vitoria.pereira@example.com', 5),
    ('Rui Sousa', 'rui.sousa@example.com',5),
    ('Lara Costa', 'lara.costa@example.com', 5),
    ('Henrique Almeida', 'henrique.almeida@example.com', 5),
    ('Tatiana Ferreira', 'tatiana.ferreira@example.com', 5),
    ('Luís Santos', 'luis.santos@example.com', 6),
    ('Mariana Lima', 'mariana.lima@example.com', 6),
    ('Hugo Gomes', 'hugo.gomes@example.com', 6),
    ('Beatriz Oliveira', 'beatriz.oliveira@example.com', 6),
    ('Gabriel Pereira', 'gabriel.pereira@example.com', 6),
    ('Isabella Sousa', 'isabella.sousa@example.com', 7),
    ('Ricardo Costa', 'ricardo.costa@example.com', 7),
    ('Amanda Almeida', 'amanda.almeida@example.com', 7),
    ('Felipe Ferreira', 'felipe.ferreira@example.com', 7),
    ('Manuela Silva', 'manuela.silva@example.com', 7),
    ('Henrique Santos', 'henrique.santos@example.com', 8),
    ('Marina Oliveira', 'marina.oliveira@example.com', 8),
    ('Leonardo Pereira', 'leonardo.pereira@example.com', 8),
    ('Ryan Martin', 'ryanmartins@example.com', 8),
    ('Lyon Mendes', 'lyonmendes@example.com', 8),
    ('Lucas Santos', 'lucas.santos@example.com', 9),
    ('Fernanda Silva', 'fernanda.silva@example.com',9),
    ('Rafael Oliveira', 'rafael.oliveira@example.com', 9),
    ('Juliana Pereira', 'juliana.pereira@example.com',9),
    ('Marcelo Sousa', 'marcelo.sousa@example.com', 9),
    ('Camila Costa', 'camila.costa@example.com', 10),
    ('Gustavo Almeida', 'gustavo.almeida@example.com', 10),
    ('Carolina Ferraz', 'carolina.ferraz@example.com', 10),
    ('Ricardo Santana', 'ricardo.santana@example.com', 10),
    ('Emily Johnson', 'emily.johnson@example.com', 10),
    ('Arthur Sampaio', 'arthursampaio@example.com', 11),
    ('Olivia Almeida', 'oliviaalmeida@example.com', 11),
    ('Peter Soon', 'petersoon@example.com', 11),
    ('Alice Vieira', 'alicevieira@example.com', 11),
    ('Miguel Torres', 'migueltorres@example.com', 11),
    ('Laura Albuquerque', 'laurabuq@example.com',12),
    ('Flávio Assunção', 'flavioassuncao@example.com', 12),
    ('Debora Seco', 'deboraseco@example.com', 12),
    ('Cauã Reymond', 'cauarey@example.com', 12),
    ('Vitória Estrada', 'vitoriaestrada@example.com', 12),
    ('Bruna Marquenize', 'brumarq@example.com', 13),
    ('Tatá Werneck', 'tatawerneck@example.com', 13),
    ('Marina Ruy Barbosa', 'marirbarb@example.com', 13),
    ('Jorge Blanco', 'jorge.blanco@example.com', 13),
    ('Rafael Vitti', 'rafa.vitti@example.com', 13),
    ('Emanuelle Araújo', 'emaraujo@example.com', 14),
    ('Carolina Herrera', 'carolina.herrera@example.com', 14),
    ('Angélica Silva', 'angel.silva@example.com', 14),
    ('Catarina Pyerce', 'catarina.pyerce@example.com', 14),
    ('Daniel Trindade', 'daniel.trindade@example.com', 14),
    ('Vanuza Lima', 'vanuzalima@example.com', 15),
    ('Rui Barbosa', 'ruibarb@example.com', 15),
    ('Rhuan Silveira' , 'rhuansilv@example.com', 15),
    ('Henri Brandt', 'henri.brandt@example.com', 15),
    ('Tati Quebra Barraco', 'tati.qb@example.com', 15),
    ('Luiz Inácio', 'lula13@example.com', 16),
    ('Bruno Unzueta', 'bruzueta@example.com',16),
    ('Hugo Boss', 'hugo.boss@example.com', 16),
    ('Beatriz Trancoso', 'beatriz.oliveira@example.com', 16),
    ('Gabriel Reis', 'gabrielreis@example.com', 16),
    ('Isís Valverde', 'isisvalverde@example.com', 17),
    ('Ricardo Tozzi', 'ricardotozzi@example.com', 17),
    ('Felipe Titto', 'felipetitto@example.com', 17),
    ('Felipe Frechiani', 'felipe.frechiani@example.com', 17),
    ('Manuela Larissa', 'manuela.larissa@example.com', 17),
    ('Davi Brandt', 'davibrandt@example.com', 18),
    ('Paolla Oliveira', 'paollaoliveira@example.com', 18),
    ('Leonardo Avilla', 'leonardo.avilla@example.com', 18),
    ('Ryan Menezes', 'ryanm@example.com', 18),
    ('Harry Styles', 'harry@example.com',18),
    ('Bruno Mars', 'bmars@example.com', 19),
    ('Fernanda Paes Leme', 'fernanda.pl@example.com',19),
    ('Nial Horan', 'nialh@example.com', 19),
    ('Juliana Paiva', 'juliana.paiv@example.com',19),
    ('Nicolas Prattes', 'nicprattes@example.com', 19),
    ('Camila Pitanga', 'camilaptga@example.com', 20),
    ('Gustavo Tubarao', 'gustavotu@example.com', 20),
    ('Carol Ferraz', 'carolina.ferr@example.com', 20),
    ('Santiago Mendes', 'santmen@example.com', 20),
    ('Emily Garcia', 'emily.garcia@example.com', 20),
    ('João Gomes', 'joao.gomes@example.com', 21),
    ('Maria da Graça', 'maria.graça@example.com', 21),
    ('Shawn Mendes', 'bolinho@example.com', 21),
    ('Ana Castella', 'anacastella@example.com', 21),
    ('Fabiola Nascimento', 'fabiolan@example.com', 21),
    ('Otaviano Costa', 'otacosta@example.com', 22),
    ('Virginia Fonseca', 'virginiafonseca@example.com', 22),
    ('Ana Mosconi', 'anamosc@example.com', 22),
    ('Vicente Vieira', 'vivieira@example.com', 22),
    ('Raquel Davilla', 'raquelDavilla@example.com', 22),
    ('Guilherme Pessoa', 'guilhermep@example.com', 23),
    ('Mirella Santos', 'Mirellasant@example.com', 23),
    ('Romulo Estrela', 'romuloestrela@example.com', 23),
    ('Grazzi Massafera', 'grazzima@example.com', 23),
    ('Josh Beauchamp', 'joshbeau@example.com', 23),
    ('Sabina Hidalgo', 'hidalgosab@example.com', 24),
    ('Maisa Silva', 'maisasil@example.com', 24),
    ('Melissa Maia', 'melissamel@example.com', 24),
    ('Karoline Lima', 'karlima@example.com', 24),
    ('Giovanna Grigio', 'giiogrigio@example.com', 24),
    ('Raissa Chadad', 'raissachadad@example.com', 25),
    ('Gabriela Saraivah', 'gabrielasaraivah@example.com', 25),
    ('Guilherme Oliveira', 'guioli@example.com', 25),
    ('Gabriel Santana', 'gabsant@example.com', 25),
    ('Livia Inhudes', 'liviainhu@example.com', 25),
    ('Cintia Cruz', 'cintiacruz@example.com', 26),
    ('Julia Oliver', 'jujuoli@example.com', 26),
    ('Julia Gomes', 'jugomes@example.com', 26),
    ('Sophia Valverde', 'sosoval@example.com', 26),
    ('Mateus Lustosa', 'mateuslustosa@example.com', 26),
    ('Isabella Paolli', 'isabellapaolli@example.com', 27),
    ('Luiza Parente', 'Luizap@example.com', 27),
    ('Virgina Wanderlei', 'virginiaderlei@example.com', 27),
    ('Ananda Morais', 'anandamorais@example.com', 27),
    ('Julia Franco', 'jufrancoo@example.com', 27),
    ('Isabela Fernandes', 'isabelfernandes@example.com', 28),
    ('João Pedro Mota', 'jpmot@example.com', 28),
    ('Gustavo Paz', 'gustavopazz@example.com', 28),
    ('Lucas Burgatti', 'lucasburg@example.com', 28),
    ('Igor Jansen', 'igorjansen@example.com', 28),
    ('Duda Pimenta', 'dudapiment@example.com', 29),
    ('Luisa Besser', 'lbresser@example.com', 29),
    ('Felipe Fontelles', 'felipefont@example.com', 29),
    ('Eric Ferreira', 'ericferr@example.com', 29),
    ('André Luis Sousa', 'andrelsou@example.com', 29),
    ('João Vitor Dourado', 'jvdourado@example.com', 30),
    ('Isadora Amaro', 'isadoraamar@example.com', 30),
    ('Valentina Costa', 'valencost@example.com', 30),
    ('Julia Holanda', 'juliaH@example.com', 30),
    ('Esther Marcos', 'esthermar@example.com', 30),
    ('Pedro Scooby', 'pedroscoo@example.com', 31),
    ('Carla Diaz', 'carladiaz@example.com', 31),
    ('Arthur Aguiar', 'arthuag@example.com', 31),
    ('Lua Blanco', 'luablanco@example.com', 31),
    ('Chay Suede', 'chaysuede@example.com', 31),
    ('Sheron Menezes', 'sheronmen@example.com', 32),
    ('Sophia Abrahão', 'sophiabrah@example.com', 32),
    ('Mel Fronckowiak', 'melfron@example.com', 32),
    ('Duda Reis', 'dudarei@example.com', 32),
    ('Lisa Barcellos', 'lisabar@example.com', 32),
    ('Jordana Maia', 'jordanamaia@example.com', 33),
    ('Taina Costa', 'tainacost@example.com', 33),
    ('Lara Silva', 'larasilv@example.com', 33),
    ('Tata Estaniecki', 'tataestaniecki@example.com', 33),
    ('Julio Cocielo', 'juliococielo@example.com', 33),
    ('Duda Kropf', 'dudakropf@example.com', 34),
    ('Fernanda Concon', 'fercon@example.com', 34),
    ('Ester Exposito', 'esteexposit@example.com', 34),
    ('Giovanna Bichels', 'giovannab@example.com', 34),
    ('Nina Baiocchi', 'ninabaio@example.com', 34),
    ('Júlia Rissato', 'jujur@example.com', 35),
    ('Giovanni Robatini', 'giovannir@example.com', 35),
    ('Igor Casseb', 'igorcas@example.com', 35),
    ('Cecilia Pedersoli', 'ceciped@example.com', 35),
    ('Malu Borges', 'maluborg@example.com', 35),
    ('Vanessa Lopes', 'vanlop@example.com', 36),
    ('Lucas Abreu', 'lucasA@example.com', 36),
    ('Clara Garcia', 'claragarcia@example.com', 36),
    ('Lucas Maciel', 'lucasmaciel@example.com', 36),
    ('Juliano Floss', 'julianoloss@example.com', 36),
    ('Julia Mazzocco', 'julimazz@example.com', 37),
    ('Ana Mazzocco', 'anamazz@example.com', 37),
    ('Malu Camargo', 'malumargo@example.com', 37),
    ('Priscila Caliari', 'pricalliari@example.com', 37),
    ('Jessi Shein', 'jessishein@example.com', 37),
    ('Nicholas Coutinho', 'nichcout@example.com', 38),
    ('Allan Jeong', 'allanjeong@example.com', 38),
    ('Thalita Meneghim', 'thalitamen@example.com', 38),
    ('Mariana Menezes', 'marianamen@example.com', 38),
    ('Arthur Bicalho', 'arthurbicalhoo@example.com', 38),
    ('Mharessa Fernanda', 'mhafern@example.com', 39),
    ('Bernardo Busnello', 'bernbusnello@example.com', 39),
    ('Caio Castro', 'caiocast@example.com', 39),
    ('Crystal Braz', 'crybrazz@example.com', 39),
    ('Duda Stecchini', 'dudatech@example.com', 39),
    ('Jully Molinna', 'jullymon@example.com', 40),
    ('Aurora Sucinta', 'ausucinta@example.com', 40),
    ('Giovanna Chaves', 'giochav@example.com', 40),
    ('Felipe Neto', 'feneto@example.com', 40),
    ('Bruna Correa', 'brureaa@example.com', 40);

INSERT INTO LOCALIZACAO (numero, logradouro, cep, FK_TIPO_LOGRADOURO_id_tipo_logradouro, FK_BAIRRO_id_bairro) VALUES
    (1, ' A', '12345678', 1, 1),
    (2, ' B', '98765432', 5, 4),
    (3, ' C', '54321876', 3, 7),
    (4, ' D', '11111111', 6, 10),
    (5, ' E', '22222222', 2, 13),
    (6, ' F', '33333333', 3, 16),
    (7, 'G', '44444444', 1, 19),
    (8, ' H', '55555555', 2, 22),
    (9, 'I', '66666666', 3, 25),
    (10, ' J', '77777777', 5, 28),
    (11, ' K', '88888888', 2, 31),
    (12, ' L', '99999999', 3, 34),
    (13, 'M', '00000000', 1, 37),
    (14, ' N', '11111111', 2, 40),
    (15, 'O', '22222222', 6, 43),
    (16, 'P', '33333333', 1, 46),
    (17, ' Q', '44444444', 4, 49),
    (18, ' R', '55555555', 7, 52),
    (19, ' S', '66666666', 1, 55),
    (20, 'T', '77777777', 2, 58),
    (21, ' U', '88888888', 4, 61),
    (22, 'V', '99999999', 1, 64),
    (23, ' W', '10101101', 6, 67),
    (24, ' X', '12121121', 3, 70),
    (25, 'Y', '13131131', 7, 73);
    
INSERT INTO Favorita (fk_EVENTO_id_evento, fk_USUARIO_id_usuario) VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (3, 6),
    (2, 7),
    (25, 8),
    (13, 9),
    (20, 10),
    (30, 11),
    (35, 12),
    (22, 13),
    (25, 14),
    (25, 15),
    (25, 16),
    (25, 17),
    (25, 18),
    (28, 19),
    (28, 20),
    (28, 21),
    (13, 22),
    (30, 23),
    (25, 24),
    (25, 25),
    (24, 26),
    (24, 27),
    (24, 28),
    (24, 29),
    (24, 30),
    (1, 31),
    (5, 32),
    (7, 34),
    (10, 35),
    (15, 36),
    (12, 37),
    (23, 38),
    (25, 39),
    (24, 40),
    (24, 41),
    (24, 42),
    (24, 43),
    (24, 44),
    (28, 45),
    (10, 45),
    (25, 46),
    (37, 47);

INSERT INTO EVENTO_PRESENCIAL (FK_buffet_buffet_PK, FK_EVENTO_id_evento, FK_LOCALIZACAO_id_localizacao) VALUES 
    (1, 1, 1),
    (1, 2, 2),
    (2, 3, 3),
    (2, 4, 4),
    (3, 5, 5),
    (3, 6, 6),
    (4, 7, 7),
    (4, 8, 8),
    (5, 9, 9),
    (5, 10, 10),
    (6, 11, 11),
    (6, 12, 12),
    (7, 13, 13),
    (7, 14, 14),
    (8, 15, 15),
    (8, 16, 16),
    (9, 17, 17),
    (9, 18, 18),
    (10, 19, 19),
    (10, 20, 20),
    (11, 21, 21),
    (11, 22, 22),
    (12, 23, 23),
    (12, 24, 24),
    (13, 25, 25);

INSERT INTO POSSUI_BAIRRO_CIDADE (FK_BAIRRO_id_bairro, FK_CIDADE_id_cidade) VALUES
    (1, 1),
    (4, 2),
    (7, 3),
    (10, 4),
    (13,5),
    (16, 6),
    (19, 7),
    (22, 8),
    (25, 9),
    (28,10),
    (1, 11),
    (4, 12),
    (7, 13),
    (10, 14),
    (13,15),
    (16, 16),
    (19, 17),
    (22, 18),
    (25, 19),
    (28,20),
    (31, 21),
    (34, 22),
    (37, 23),
    (40, 24),
    (43, 25);

INSERT INTO POSSUI_CIDADE_ESTADO (FK_CIDADE_id_cidade, FK_ESTADO_id_estado) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8,8),
    (9, 9),
    (10, 10),
    (11, 11),
    (12, 12),
    (13, 13),
    (14, 14),
    (15, 15),
    (16, 16),
    (17, 17),
    (18, 18),
    (19, 19),
    (20, 20),
    (21, 21),
    (22, 22),
    (23, 23),
    (24, 24),
    (25, 25),
    (26, 26),
    (27, 27);

INSERT INTO POSSUI_TIPO_CONTATO_EVENTO (descricao, FK_TIPO_CONTATO_id_tipo_contato, FK_EVENTO_id_evento) VALUES
    ('tecconferencia' ,3, 1),
    ('jemnoivos' ,3, 2),
    ('fotoshop' , 3, 3),
    ('musicfest' ,3, 4),
    ('27992239636', 2, 5),
    ('21992655593', 2, 6),
    ('11992059693', 2, 7),
    ('84985259493', 2, 8),
    ('21993859293', 2, 9),
    ('11992659773', 2, 10),
    ('marketingsem@gmail.com',1, 11),
    ('showaovivo@gmail.com',1, 12),
    ('lojdalore@gmail.com',1, 13),
    ('classiconsert@gmail.com',1, 14),
    ('sambacomfeijao@gmail.com',1, 15),
    ('expoarte@gmail.com',1, 16),
    ('@medcongre' ,4 ,17),
    ('@polentafest',4 ,18),
    ('@citycultura' ,4 ,19),
    ('@cienciasimple' ,4 ,20),
    ('@vinhofest' ,4 ,21),
    ('@morangofest' ,4 ,22),
    ('@lewedding' ,4 ,23),
    ('@eventando.nozes' ,4 ,24),
    ('@eventpresent1' ,4 ,25),
    ('@eventpresent2' ,4 ,26),
    ('@eventpresent3' ,4 ,27),
    ('@eventpresent4' ,4 ,28),
    ('@eventpresent5' ,4 ,29),
    ('@eventpresent6' ,4 ,30),
    ('@eventpresent7' ,4 ,31),
    ('@eventpresent8' ,4 ,32),
    ('@eventpresent9' ,5, 33),
    ('@eventpresent10' ,5, 34),
    ('@eventpresent11' ,5, 35),
    ('@eventpresent12' ,5, 36),
    ('@eventpresent13' ,5, 37),
    ('@eventpresent14' ,5, 38),
    ('@eventpresent15' ,5, 39),
    ('@eventpresent16' ,5, 40);

INSERT INTO TEM_TIPO_CONTATO_USUARIO (FK_TIPO_CONTATO_id_tipo_contato, descricao, FK_USUARIO_id_usuario) VALUES
    (2,'85998124767', 1),
    (2,'82998124765', 2),
    (2,'829971-4768', 3),
    (2,'92992124767', 4),
    (2,'71993124767', 5),
    (2,'68998128888', 6),
    (2,'82998122425', 7),
    (2,'96998134767', 8),
    (2,'92995024767', 9),
    (2,'71999124767', 10),
    (2,'68991124767', 11),
    (2,'82998124467', 12),
    (2,'96998124755', 13),
    (2,'92995046168', 14),
    (2,'71995046166', 15),
    (2,'68981815344', 16),
    (2,'82981574947', 17),
    (2,'96996570589', 18),
    (2,'92988955725', 19),
    (2,'71995000028', 20),
    (2,'68997445347', 21),
    (2,'82996623266', 22),
    (2,'96988388919', 23),
    (2,'92992051225', 24),
    (2,'71997376136', 25),
    (2,'68998950028', 26),
    (2,'82998867284', 27),
    (2,'96999817077', 28),
    (2,'92996517829', 29),
    (2,'71998677339', 30),
    (2,'68992910382', 31),
    (2,'82995273201', 32),
    (2,'96998296191', 33),
    (2,'92981425937', 34),
    (2,'71996107736', 35),
    (2,'68997611853', 36),
    (2,'82997525329', 37),
    (2,'96988579546', 38),
    (2,'92998823175', 39),
    (2,'71999860303', 40),
    (2,'68988070615', 41),
    (2,'82998905887', 42),
    (2,'96997803226', 43),
    (2,'92997358233', 44),
    (2,'71997688723', 45),
    (2,'68992846124', 46),
    (2,'82988953905', 47);