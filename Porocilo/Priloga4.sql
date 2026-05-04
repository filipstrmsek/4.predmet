INSERT INTO KATEGORIJE (Ime_kategorije) VALUES
('Sadje in zelenjava'),
('Mlečni izdelki'),
('Ribe'),
('Meso'),
('Pekovski izdelki'),
('Pijače');

INSERT INTO IZDELKI (kategorija_id, ime_izdelka, Cena, slika, je_akcija, cena_akcije) VALUES
(1, 'Jabolko', 1.20, 'slike/jabolko.jpg', false, NULL),
(1, 'Banana', 0.90, 'slike/banana.jpg', true, 0.60),
(1, 'Paradižnik', 1.50, 'slike/paradiznik.jpg', false, NULL),
(1, 'Solata', 0.80, 'slike/solata.jpg', false, NULL),

(2, 'Mleko 1L', 1.10, 'slike/mleko.jpg', false, NULL),
(2, 'Jogurt', 0.75, 'slike/jogurt.jpg', true, 0.50),
(2, 'Sir Gouda', 3.50, 'slike/sir.jpg', false, NULL),
(2, 'Maslo', 2.20, 'slike/maslo.jpg', false, NULL),

(3, 'Losos', 8.90, 'slike/losos.jpg', true, 6.50),
(3, 'Tuna', 5.50, 'slike/tuna.jpg', false, NULL),
(3, 'Postrv', 6.90, 'slike/postrv.jpg', false, NULL),

(4, 'Piščanec', 4.50, 'slike/pischanec.jpg', false, NULL),
(4, 'Svinjski zrezek', 5.90, 'slike/svinjski.jpg', true, 4.20),
(4, 'Goveje meso', 7.80, 'slike/goveje.jpg', false, NULL),
(4, 'Salama', 3.20, 'slike/salama.jpg', false, NULL),

(5, 'Beli kruh', 1.20, 'slike/kruh.jpg', false, NULL),
(5, 'Žemlja', 0.30, 'slike/zemlja.jpg', false, NULL),
(5, 'Rogljič', 0.50, 'slike/rogljic.jpg', true, 0.30),
(5, 'Polnozrnat kruh', 1.80, 'slike/polnozrnat.jpg', false, NULL),

(6, 'Sok pomaranča', 1.50, 'slike/sok.jpg', false, NULL),
(6, 'Voda 1.5L', 0.69, 'slike/voda.jpg', true, 0.49),
(6, 'Coca Cola', 1.20, 'slike/cola.jpg', false, NULL),
(6, 'Energijska pijača', 1.80, 'slike/energy.jpg', false, NULL);

INSERT INTO UPORABNIKI (ime, priimek, email, geslo) VALUES
('Filip', 'Strmsek', 'filip.strmsek@gmail.com', 'geslo123'),
('Alex', 'Strmsek', 'alex.strmsek@gmail.com', 'geslo123');