DROP TABLE IF EXISTS Activities;

CREATE TABLE Activities (
    actiId INT AUTO_INCREMENT NOT NULL,
    actiName VARCHAR(200) NOT NULL,
    actiBriefDescription VARCHAR(2000) NOT NULL,
    actiBenefits VARCHAR(2000) NOT NULL,
    actiPrice VARCHAR(1000) NOT NULL,
    CONSTRAINT a_actiId_pk PRIMARY KEY (actiId)
);

INSERT INTO Activities (actiName, actiBriefDescription, actiBenefits, actiPrice)  
VALUES  
('Fitness', 'General fitness activities encompass a wide range of exercises aimed at improving overall health and well-being. This can include cardiovascular exercises, strength training, flexibility exercises, and more.',  
'Improves cardiovascular health; supports weight management; enhances mental well-being; increases energy levels',  
'From £30 per hour'); 

INSERT INTO Activities (actiName, actiBriefDescription, actiBenefits, actiPrice)  
VALUES  
('Strength Training', 'Strength training involves using resistance to build muscle strength and endurance.',  
'Builds muscle mass; improves bone density; boosts metabolism; enhances overall physical performance',  
'From £50 per 45 minutes'); 

INSERT INTO Activities (actiName, actiBriefDescription, actiBenefits, actiPrice)  
VALUES  
('Yoga', 'Mind-body practice that combines physical postures, breathing exercises, and meditation.',  
'Improves flexibility and balance; reduces stress',  
'From £35 per 45 minutes'); 

INSERT INTO Activities (actiName, actiBriefDescription, actiBenefits, actiPrice)  
VALUES  
('Pilates', 'Low-impact exercise that focuses on strengthening muscles while improving postural alignment and flexibility.',  
'Strengthens core muscles; improves posture; increases flexibility; aids in injury recovery',  
'From £30 per 45 minutes');  

DROP TABLE IF EXISTS Trainers;

CREATE TABLE Trainers (
    triId INT AUTO_INCREMENT,
    triName VARCHAR(100) NOT NULL ,
    triEmail VARCHAR(100) NOT NULL UNIQUE,
    triLocation VARCHAR(200) NOT NULL,
    triCertifications VARCHAR(500) NOT NULL,
    triYear INT NOT NULL,
    triSpecialization VARCHAR(200) NOT NULL,
    CONSTRAINT t_triId_pk PRIMARY KEY (triId)
);

INSERT INTO Trainers (triName, triEmail, triLocation, triCertifications, triYear, triSpecialization)  
VALUES  
('Mary Brown','mary@may.com', 'NW3 only', 'Level 3', 3, 'Fitness, Yoga');  

INSERT INTO Trainers (triName, triEmail, triLocation, triCertifications, triYear, triSpecialization)  
VALUES  
('James White', 'james@james.com', 'SW1 and online', 'Level 3', 5, 'Fitness, Strength Training');  

INSERT INTO Trainers (triName, triEmail, triLocation, triCertifications, triYear, triSpecialization)  
VALUES  
('Ann Blue ','ann@ann.com', 'Online only', 'ISSA', 5, 'Pilates, Strength Training');   

INSERT INTO Trainers (triName, triEmail, triLocation, triCertifications, triYear, triSpecialization)  
VALUES  
('Peter Red ','peter@peter.com', 'NW2, NW3', 'Level 3', 4, 'Pilates');  