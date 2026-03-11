-- Tworzenie bazy danych
CREATE DATABASE sklep;

-- Użycie bazy danych
USE sklep;

-- Tworzenie tabeli
CREATE TABLE klienci (
    id INT PRIMARY KEY AUTO_INCREMENT,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    email VARCHAR(100)
);

-- Dodawanie danych
INSERT INTO klienci (imie, nazwisko, email)
VALUES ('Jan', 'Kowalski', 'jan.kowalski@email.com');

INSERT INTO klienci (imie, nazwisko, email)
VALUES ('Anna', 'Nowak', 'anna.nowak@email.com');

-- Pobieranie danych
SELECT * FROM klienci;

-- Aktualizacja danych
UPDATE klienci
SET email = 'jan.nowy@email.com'
WHERE id = 1;

-- Usuwanie danych
DELETE FROM klienci
WHERE id = 2;

-- Usunięcie tabeli
DROP TABLE klienci;