
CREATE DATABASE api;
USE api;
CREATE TABLE "cli" (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


// modelo de Post  no Postman 
{
    
    "nome": "Teste",
    "sobrenome": "Mensagem",
    "telefone": "336655",
    "email": "asasas",
    "endereco": "Avenida brasil",
    "cidade": "franca",
    "estado": "sp"
}