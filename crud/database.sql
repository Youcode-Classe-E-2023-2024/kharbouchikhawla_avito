CREATE DATABASE publication;

CREATE TABLE annonces(
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(70)NOT NULL,
    prix INT OT NULL,
    description VARCHAR(300) 
);