CREATE TABLE store (
storeId SERIAL NOT NULL PRIMARY KEY,
storeName  varchar(80)
);

CREATE TABLE ownedBy (
ownedById SERIAL NOT NULL PRIMARY KEY,
firstName varchar(80),
lastName  varchar(80)
);

CREATE TABLE room (
roomId SERIAL NOT NULL PRIMARY KEY,
room varchar(80)
);

CREATE TABLE item (
itemId SERIAL NOT NULL PRIMARY KEY,
itemDescription  varchar(80),
model  varchar(80),
serialNumber  varchar(80),
purchasePrice  money,
purchaseDate  date,
store_id  int REFERENCES store (storeId),
owner_id  int REFERENCES ownedBy (ownedById),
room_id  int REFERENCES room (roomId)
);



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