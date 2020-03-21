CREATE TABLE medication_list (
id SERIAL NOT NULL PRIMARY KEY,
medName  INT REFERENCES medication (id),
dosage  VARCHAR(80),
startDate  DATE,
endDate  DATE,
reason  VARCHAR(500),
prescibingDoctor  INT REFERENCES doctor (id)
);

CREATE TABLE doctor (
id SERIAL NOT NULL PRIMARY KEY,
firstName VARCHAR(80),
lastName  VARCHAR(80),
specialty VARCHAR(80),
address_1 VARCHAR(80),
address_2 VARCHAR(80),
city VARCHAR(80),
state VARCHAR(2),
zip INT,
phone VARCHAR(15)
);

CREATE TABLE medication (
    id SERIAL NOT NULL PRIMARY KEY,
    medName VARCHAR(80),
    
)



INSERT INTO room (room) VALUES ('Base Room');
INSERT INTO room (room) VALUES ('Base Room2');
INSERT INTO ownedBy (firstName, lastName) VALUES ('BaseFirst', 'BaseLast');
INSERT INTO ownedBy (firstName, lastName) VALUES ('BaseFirst2', 'BaseLast2');
INSERT INTO store (storeName) VALUES ('Base Store');
INSERT INTO store (storeName) VALUES ('Base Store2');
INSERT INTO item (itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id)
  VALUES ('Base Description', 'Base Model', 'Base S/N', 1.23, '2020-01-01', 1, 1, 1);
INSERT INTO item (itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id)
  VALUES ('Base Description2', 'Base Model2', 'Base S/N2', 1.23, '2020-01-02', 2, 2, 2);