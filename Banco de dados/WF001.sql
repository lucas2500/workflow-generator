CREATE TABLE wf001(
	nome VARCHAR (200),
	status VARCHAR(30),
	destinatario VARCHAR(255),
	assunto VARCHAR (255),
	corpo VARCHAR (350),
	rodape VARCHAR(255),
	recorrencia INT,
	anexo01 VARCHAR(50),
	anexo02 VARCHAR(50),
	anexo03 VARCHAR(50),
	ID INT PRIMARY KEY AUTO_INCREMENT
);