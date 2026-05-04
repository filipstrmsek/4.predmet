CREATE DATABASE spletnatrgovina;

use spletnatrgovina;

CREATE TABLE KATEGORIJE (
    id INT NOT NULL AUTO_INCREMENT,
    Ime_kategorije VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE UPORABNIKI (
    id INT NOT NULL AUTO_INCREMENT,
    ime VARCHAR(50) NOT NULL,
    priimek VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    geslo VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IZDELKI (
    Id INT NOT NULL AUTO_INCREMENT,
    kategorija_id INT NOT NULL,
    ime_izdelka VARCHAR(100) NOT NULL,
    Cena FLOAT NOT NULL,
    slika VARCHAR(500) NOT NULL,
    je_akcija BOOL,
    cena_akcije FLOAT,
    PRIMARY KEY (Id),
    FOREIGN KEY (kategorija_id) REFERENCES KATEGORIJE(id)
);

CREATE TABLE NAROCILA (
    id INT NOT NULL AUTO_INCREMENT,
    uporabnik_id INT NOT NULL,
    Datum DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (uporabnik_id) REFERENCES UPORABNIKI(id)
);

CREATE TABLE NAROCILO_IZDELKI (
    id INT NOT NULL AUTO_INCREMENT,
    izdelek_id INT NOT NULL,
    narocilo_id INT NOT NULL,
    kolicina INT NOT NULL,
    cena FLOAT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (izdelek_id) REFERENCES IZDELKI(Id),
    FOREIGN KEY (narocilo_id) REFERENCES NAROCILA(id)
);

CREATE TABLE KOSARICA (
    id INT NOT NULL AUTO_INCREMENT,
    uporabnik_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (uporabnik_id) REFERENCES UPORABNIKI(id)
);

CREATE TABLE KOSARICA_IZDELKI (
    id INT NOT NULL AUTO_INCREMENT,
    Kolicina INT NOT NULL,
    kosarica_id INT NOT NULL,
    izdelek_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (kosarica_id) REFERENCES KOSARICA(id),
    FOREIGN KEY (izdelek_id) REFERENCES IZDELKI(Id)
);

