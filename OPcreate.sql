-- This is a script for the peaceoperatives database which is a fictional database created with the intention of -- learning. This might also be impractical as it is a highly normalized database. 
-- 
CREATE TABLE Employee
(
  EmployeeID INT NOT NULL,
  ContactNo INT NOT NULL,
  EmpName VARCHAR(30) NOT NULL,
  PRIMARY KEY (EmployeeID)
);

CREATE TABLE Mission
(
  Duration VARCHAR(30) NOT NULL,
  MissonID INT NOT NULL,
  Description VARCHAR(50) NOT NULL,
  PRIMARY KEY (MissonID)
);

CREATE TABLE Partner
(
  PartnerID INT NOT NULL,
  Description VARCHAR(50) NOT NULL,
  PRIMARY KEY (PartnerID)
);

CREATE TABLE AccessLevel
(
  AccessLevel INT NOT NULL,
  LevelName VARCHAR(10) NOT NULL,
  PRIMARY KEY (AccessLevel)
);

CREATE TABLE MissionEmployee
(
  MissonID INT NOT NULL,
  EmployeeID INT NOT NULL,
  PRIMARY KEY (MissonID, EmployeeID),
  FOREIGN KEY (MissonID) REFERENCES Mission(MissonID),
  FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);

CREATE TABLE MissionLocation
(
  Location VARCHAR(30) NOT NULL,
  MissonID INT NOT NULL,
  PRIMARY KEY (Location, MissonID),
  FOREIGN KEY (MissonID) REFERENCES Mission(MissonID)
);

CREATE TABLE PartnerContact
(
  PContactNo VARCHAR(30) NOT NULL,
  PartnerID INT NOT NULL,
  PRIMARY KEY (PContactNo, PartnerID),
  FOREIGN KEY (PartnerID) REFERENCES Partner(PartnerID)
);

CREATE TABLE MissionPartner
(
  MissonID INT NOT NULL,
  PartnerID INT NOT NULL,
  PRIMARY KEY (MissonID, PartnerID),
  FOREIGN KEY (MissonID) REFERENCES Mission(MissonID),
  FOREIGN KEY (PartnerID) REFERENCES Partner(PartnerID)
);

CREATE TABLE VehicleType
(
  VehicleType VARCHAR(30) NOT NULL,
  VehicleID INT NOT NULL,
  PRIMARY KEY (VehicleID)
);

CREATE TABLE VehicleEquipment
(
  Equipment VARCHAR(30) NOT NULL,
  InstallationDate VARCHAR(10) NOT NULL,
  VehicleID INT NOT NULL,
  PRIMARY KEY (Equipment, InstallationDate),
  FOREIGN KEY (VehicleID) REFERENCES VehicleType(VehicleID)
);

CREATE TABLE VehicleAccess
(
  VehicleID INT NOT NULL,
  AccessLevel INT NOT NULL,
  PRIMARY KEY (VehicleID, AccessLevel),
  FOREIGN KEY (VehicleID) REFERENCES VehicleType(VehicleID),
  FOREIGN KEY (AccessLevel) REFERENCES AccessLevel(AccessLevel)
);

CREATE TABLE EAccess
(
  EmployeeID INT NOT NULL,
  AccessLevel INT NOT NULL,
  PRIMARY KEY (EmployeeID, AccessLevel),
  FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
  FOREIGN KEY (AccessLevel) REFERENCES AccessLevel(AccessLevel)
);

CREATE TABLE MissionVehicles
(
  MissonID INT NOT NULL,
  VehicleID INT NOT NULL,
  PRIMARY KEY (MissonID, VehicleID),
  FOREIGN KEY (MissonID) REFERENCES Mission(MissonID),
  FOREIGN KEY (VehicleID) REFERENCES VehicleType(VehicleID)
);

CREATE TABLE VehicleDescription
(
  VDescription VARCHAR(50) NOT NULL,
  VehicleID INT NOT NULL,
  PRIMARY KEY (VDescription, VehicleID),
  FOREIGN KEY (VehicleID) REFERENCES VehicleType(VehicleID)
);

-- Inserting data into the databases

 INSERT INTO Employee VALUES
(890001,598694567,'Halle Berry'),
(890002,987656452,'Ronald burgers'),
(890003,445676475,'Keanu Steaves'),
(890004,445676486, 'Blake Blakey');

INSERT INTO Mission VALUES
('5 years, 10 weeks',2020901,'Operative has to bring 500 food crates'),
('2 years',2020902,'Operative has to negotiate with locals'),
('6 years',2020903,'Operative has to scout nearby villages for danger');

INSERT INTO Partner VALUES
(40001,'Name: Jimmy Johnson, Ex special ops'),
(40002,'Name: Jimmy figgis , retired postworkerx'),
(40003,'Name: Rat smith, Theoretical physicist'),
(40004,'Name: Janet Jackson, Musician');

INSERT INTO AccessLevel VALUES
(001,'Alpha'),
(002,'Beta'),
(003,'Gamma');

INSERT INTO MissionEmployee VALUES
(2020901,890001),
(2020901,890002),
(2020902,890003),
(2020903,890004);

INSERT INTO MissionLocation VALUES
('Los Angeles,USA',2020901),
('Singapore,Singapore',2020902),
('Damascus,Syria',2020903);

INSERT INTO PartnerContact VALUES
(123456678,40001),
(681957125,40002),
(462613678,40003),
(152521256,40004);

INSERT INTO MissionPartner VALUES
(2020901,40001),
(2020901,40004),
(2020902,40003),
(2020903,40002);

INSERT INTO VehicleType VALUES
('SUV',20301),
('Modified SUV',20302),
('Flatbed',20303);

INSERT INTO VehicleEquipment VALUES
('Defribillator','02-03-2020',20301),
('Bulletproof Tires','04-05-2020',20302),
('WheelChair','04-05-2019',20303);

INSERT INTO VehicleAccess VALUES
(20301,001),
(20302,001),
(20303,003),
(20302,002);

INSERT INTO EAccess VALUES
(890001,001),
(890002,003),
(890003,001),
(890004,002);

INSERT INTO MissionVehicles VALUES
(2020901,20301),
(2020902,20302),
(2020903,20303);

INSERT INTO VehicleDescription VALUES
('Hummer with custom engravings',20301),
('Humvee',20302),
('Toyota Flatbed',20303);
