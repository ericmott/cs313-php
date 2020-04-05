CREATE TABLE medication (
  medId SERIAL NOT NULL PRIMARY KEY,
  medication  VARCHAR(80) NOT NULL,
  dosage  VARCHAR(80),
  frequency VARCHAR(80),
  startDate  DATE,
  endDate  DATE,
  reason  VARCHAR(500),
  medData_id  INT REFERENCES med_data (medDataId),
  doc_id  INT REFERENCES doctor (docId)
);

CREATE TABLE doctor (
  docId SERIAL NOT NULL PRIMARY KEY,
  docFirstName VARCHAR(80),
  docLastName  VARCHAR(80) NOT NULL,
  specialty VARCHAR(80),
  address_1 VARCHAR(80),
  address_2 VARCHAR(80),
  city VARCHAR(80),
  stateAbrev VARCHAR(2),
  zip INT,
  phone VARCHAR(15),
  UNIQUE (docFirstName, docLastName, specialty)
);

CREATE TABLE med_data (
  medDataId SERIAL NOT NULL PRIMARY KEY,
  medName VARCHAR(80),
  brandName VARCHAR(80),
  genericName VARCHAR(80) UNIQUE,
  medDescription VARCHAR(500)
);


INSERT INTO doctor (docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone) 
VALUES ('docFirst-1', 'docLast-1', 'specialty-1', 'address_1-1', 'address_2-1', 'city-1', '01', 11111, 'phone1');
INSERT INTO doctor (docFirstName, docLastName, specialty, address_1, address_2, city, stateAbrev, zip, phone) 
VALUES ('docFirst-2', 'docLast-2', 'specialty-2', 'address_1-2', 'address_2-2', 'city-2', '02', 22222, 'phone2');

INSERT INTO med_data (medName, brandName, genericName, medDescription)
VALUES ('medName-1', 'brandName-1', 'genericName-1', 'medDescription-1');
INSERT INTO med_data (medName, brandName, genericName, medDescription)
VALUES ('medName-2', 'brandName-2', 'genericName-2', 'medDescription-2');

INSERT INTO medication (medication, dosage, frequency, startDate,
endDate, reason, medData_id, doc_id) VALUES ('Med-1, medData-1, doc-1', 
'10 mg', '2X/day', '2020-04-04', '2020-05-04', 'Fuzzy Tongue', 1, 1);
INSERT INTO medication (medication, dosage, frequency, startDate,
endDate, reason, medData_id, doc_id) VALUES ('Med-1, medData-0, doc-0', 
'10 mg', '2X/day', '2020-04-04', '2020-05-04', 'Fuzzy Tongue', 2, 2);