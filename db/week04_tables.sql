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



INSERT INTO room (room) VALUES ('Family Room');
INSERT INTO room (room) VALUES ('Garage');
INSERT INTO ownedBy (firstName, lastName) VALUES ('Eric', 'Mott');
INSERT INTO ownedBy (firstName, lastName) VALUES ('Jill', 'Thomson');
INSERT INTO store (storeName) VALUES ('Best Buy');
INSERT INTO store (storeName) VALUES ('Costco');
INSERT INTO item (itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id)
  VALUES ('Laptop', 'Lenovo 242', '2334AEEC3322DDS', 1295.97, '2019-08-23', 2, 1, 1);
INSERT INTO item (itemDescription, model, serialNumber, purchasePrice, purchaseDate, store_id, owner_id, room_id)
  VALUES ('Cell Phone', 'iPhone 8', 'AEEX335422OLL', 495.99, '2019-04-11', 1, 2, 2);