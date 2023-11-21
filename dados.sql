-- usuarios
INSERT INTO usuario VALUES ("111", "Guilherme", "gui@gmail.com", "123456", "31989999999", "Assis", "2023-11-21", "2000-01-01");
INSERT INTO usuario VALUES ("222", "Vitor", "vitor@gmail.com", "123456", "31989999999", "Souza", "2023-11-21", "2000-01-01");
INSERT INTO usuario VALUES ("333", "Maria", "maria@gmail.com", "123456", "31989999999", "Assis", "2023-11-21", "2000-01-01");
INSERT INTO usuario VALUES ("444", "Pedro", "pedro@gmail.com", "123456", "31989999999", "Silva", "2023-11-21", "2000-01-01");
INSERT INTO usuario VALUES ("555", "Tiago", "tiago@gmail.com", "123456", "31989999999", "Assis", "2023-11-21", "2000-01-01");

-- marca
INSERT INTO marca VALUES ("Ford", "ford.png");
INSERT INTO marca VALUES ("Fiat", "fiat.png");
INSERT INTO marca VALUES ("Chevrolet", "chevrolet.png");
INSERT INTO marca VALUES ("Volkswagen", "volkswagen.png");
INSERT INTO marca VALUES ("Toyota", "toyota.png");


-- categoria
INSERT INTO categoria VALUES ("Sedan");
INSERT INTO categoria VALUES ("Hatch");
INSERT INTO categoria VALUES ("SUV");
INSERT INTO categoria VALUES ("Picape");
INSERT INTO categoria VALUES ("Moto");


-- modelo
INSERT INTO modelo VALUES ("021", "Yaris", "Toyota", "Sedan");
INSERT INTO modelo VALUES ("031", "Ka", "Ford", "Sedan");
INSERT INTO modelo VALUES ("108", "Onix", "Chevrolet", "Hatch");
INSERT INTO modelo VALUES ("051", "Gol", "Volkswagen", "Hatch");
INSERT INTO modelo VALUES ("071", "Strada", "Fiat", "Picape");


-- localizacao
INSERT INTO localizacao VALUES ("MG", "Belo Horizonte");
INSERT INTO localizacao VALUES ("SP", "São Paulo");
INSERT INTO localizacao VALUES ("RJ", "Rio de Janeiro");
INSERT INTO localizacao VALUES ("ES", "Vitória");
INSERT INTO localizacao VALUES ("BA", "Salvador");



-- Anuncios
INSERT INTO anuncio VALUES (1, "BRA2E19", "111", "MG", "Belo Horizonte", "021", 30000, "Yaris Sedan 2020", "2023-11-21", 2020, 2021, 85000, "Disponivel");
INSERT INTO anuncio VALUES (2, "BRA2E20", "222", "SP", "São Paulo", "031", 40000, "KA Sedan 2019", "2023-11-21", 2019, 2019, 55000, "Disponivel");
INSERT INTO anuncio VALUES (3, "BRA2E21", "333", "MG", "Belo Horizonte", "108", 50000, "Onix Hatch 2020", "2023-11-21", 2020, 2020, 65000, "Disponivel");
INSERT INTO anuncio VALUES (4, "BRA2E22", "444", "MG", "Belo Horizonte", "051", 60000, "Gol Hatch 2014", "2023-11-21", 2014, 2014, 40000, "Disponivel");
INSERT INTO anuncio VALUES (5, "BRA2E23", "555", "MG", "Belo Horizonte", "071", 70000, "Strada Picape 2020", "2023-11-21", 2020, 2020, 70000, "Disponivel");

-- Fotos
INSERT INTO foto VALUES ("foto1-1.png", 1, 1);
INSERT INTO foto VALUES ("foto2-1.png", 1, 2);
INSERT INTO foto VALUES ("foto1-2.png", 2, 1);
INSERT INTO foto VALUES ("foto2-2.png", 2, 2);
INSERT INTO foto VALUES ("foto1-3.png", 3, 1);
INSERT INTO foto VALUES ("foto2-3.png", 3, 2);
INSERT INTO foto VALUES ("foto1-4.png", 4, 1);
INSERT INTO foto VALUES ("foto2-4.png", 4, 2);
INSERT INTO foto VALUES ("foto1-5.png", 5, 1);
INSERT INTO foto VALUES ("foto2-5.png", 5, 2);


-- Mensagem
