/*******************************************
Admin (id, name, email, phone number,password)
User (id, name, email, phone number,password)
Sales (id, userId, MerchID, Amount, Total)
Merch (id, picLocation, price, amount)
Team (id, name, picLocation, about, age, statUS)
News (id, Title, picLocation, description, date=default)

below is the code for the above schema
********************************************/
CREATE DATABASE FootballDB;
USE FootballDB;
/*
CREATE TABLE Admin(
	id INT PRIMARY KEY NOT NULL auto_increment, 
    FName VARCHAR(45) NOT NULL,
    LName VARCHAR(45) NOT NULL,
    EMail VARCHAR(100) NOT NULL UNIQUE CHECK(EMail like '%@%.%') ,
    Pnumber VARCHAR(10) NOT NULL UNIQUE,
    Password VARCHAR(20) NOT NULL
);
*/
CREATE TABLE User(
	id INT PRIMARY KEY NOT NULL auto_increment, 
    FName VARCHAR(45) NOT NULL,
    LName VARCHAR(45) NOT NULL,
    EMail VARCHAR(100) NOT NULL UNIQUE CHECK(EMail like '%@%.%') ,
    Pnumber VARCHAR(10) NOT NULL UNIQUE,
    Password VARCHAR(20) NOT NULL
);
CREATE TABLE Merch(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    PicLocation VARCHAR(300), /*lOCATION OF THE PICTURE IN THE FILE SYSTEM */
    name VARCHAR(100),
    Price DECIMAL
);
CREATE TABLE Orders(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    MerchID INT  NOT NULL,
    UserID INT NOT NULL,
    Amount INT NOT NULL,
    Total DECIMAL NOT NULL,
    CONSTRAINT FOREIGN KEY (USERID) REFERENCES User(ID),
    CONSTRAINT FOREIGN KEY (MerchID) REFERENCES Merch(ID)
);
CREATE TABLE Team(
	id INT PRIMARY KEY NOT NULL auto_increment, 
    FName VARCHAR(45) NOT NULL,
    LName VARCHAR(45) NOT NULL,    
    PicLocation VARCHAR(300),
    About TEXT,
    Age INT,
    Status VARCHAR(50)
);
CREATE TABLE News(                             
	id INT PRIMARY KEY NOT NULL auto_increment,
    Title VARCHAR(100) NOT NULL,               
    PicLocation VARCHAR(300),                  
    Description TEXT,                          
    Date TIMESTAMP                             
);
CREATE TABLE Fixtures(                         
	id INT PRIMARY KEY NOT NULL auto_increment,
    -- ticketId INT,                              
	Name VARCHAR(45),                          
    location varchar(100),  
    ticketPrice DECIMAL,                   
	DATE DATE                          
    -- CONSTRAINT FOREIGN KEY (ticketId) REFERENCES Merch(ID)
);