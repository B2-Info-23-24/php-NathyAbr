-- Table des Logements
CREATE TABLE Logements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    ville VARCHAR(255),
    type_logement VARCHAR(50),
    photo_url VARCHAR(255),
    prix_nuit DECIMAL(10, 2),
    service_propose VARCHAR(255),
    equipements VARCHAR(255),
);

-- Table des Equipements
CREATE TABLE Equipements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
  
);

-- Table des Services
CREATE TABLE Services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
    -- Autres attributs si nécessaire
);

-- Table des Utilisateurs
CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    numero_telephone VARCHAR(20),
    adresse_mail VARCHAR(255),
    mot_de_passe VARCHAR(255) 
);

-- Avis
CREATE TABLE Avis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_logement INT,
    nombre_etoiles INT,
    commentaire TEXT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_logement) REFERENCES Logements(id)
);

--  Reservations
CREATE TABLE Reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_logement INT,
    date_debut DATE,
    date_fin DATE,
    prix_total DECIMAL(10, 2),
    note_logement INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_logement) REFERENCES Logements(id)
);

-- Disponibilites
CREATE TABLE Disponibilites (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT NOT NULL,
    date_disponible DATE NOT NULL,
    FOREIGN KEY (id_logement) REFERENCES Logements(id)
);

-- Table de jonction pour Logement-Equipement
CREATE TABLE LogementEquipement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT,
    id_equipement INT,
    FOREIGN KEY (id_logement) REFERENCES Logements(id),
    FOREIGN KEY (id_equipement) REFERENCES Equipements(id)
);

-- Table de jonction pour Logement-Service
CREATE TABLE LogementService (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_logement INT,
    id_service INT,
    FOREIGN KEY (id_logement) REFERENCES Logements(id),
    FOREIGN KEY (id_service) REFERENCES Services(id)
);

-- Table de jonction pour Utilisateur-Logement-Favori
CREATE TABLE UtilisateurLogementFavori (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_logement INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_logement) REFERENCES Logements(id)
);

-- -- Informations de Paiement
-- CREATE TABLE InformationsPaiement (
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     id_reservation INT NOT NULL,
--     montant DECIMAL(10, 2) NOT NULL,
--     mode_paiement VARCHAR(50) NOT NULL,
--     date_paiement DATE NOT NULL,
--     FOREIGN KEY (id_reservation) REFERENCES Reservations(id)
-- );

-- Ajout d'autres champs dans la table Utilisateurs si nécessaire
ALTER TABLE Utilisateurs
ADD COLUMN date_inscription DATE;

-- Ajout d'autres champs dans la table Logements si nécessaire
ALTER TABLE Logements
ADD COLUMN description TEXT;

-- Ajout d'autres champs dans la table Avis si nécessaire
ALTER TABLE Avis
ADD COLUMN date_avis DATE;
