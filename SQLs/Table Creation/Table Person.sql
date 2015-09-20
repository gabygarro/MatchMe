CREATE TABLE Person
  (
    personID               NUMBER (3) CONSTRAINT personID_nn NOT NULL ,
    --CONSTRAINT personID_unique UNIQUE (personID) ,
    firstName              VARCHAR2 (50) CONSTRAINT firstName_nn NOT NULL ,
    lastName1              VARCHAR2 (50) CONSTRAINT lastName1_nn NOT NULL ,
    lastName2              VARCHAR2 (50) ,
    birthday               DATE CONSTRAINT birthday_nn NOT NULL ,
    registerDate           DATE DEFAULT SYSDATE CONSTRAINT registerDate_nn NOT NULL ,
    nickname               VARCHAR2 (25) ,
    address                VARCHAR2 (140) ,
    tagline                VARCHAR2 (200) ,
    highSchool             VARCHAR2 (100) ,
    university             VARCHAR2 (100) ,
    workPlace              VARCHAR2 (100) ,
    salary                 NUMBER (7) ,
    height                 NUMBER (2,2) CONSTRAINT height_nn NOT NULL ,
    smoker                 NUMBER (1) CONSTRAINT smoker_nn NOT NULL ,
    numberOfKids           NUMBER (2) CONSTRAINT numberOfKids_nn NOT NULL ,
    interestedInKids       NUMBER (1) CONSTRAINT interestedInKids_nn NOT NULL ,
    likesPets              NUMBER (1) CONSTRAINT likesPets_nn NOT NULL ,
    eyesColorId            NUMBER (3) CONSTRAINT eyesColorID_nn NOT NULL ,
    genderID               NUMBER (3) CONSTRAINT genderID_nn NOT NULL ,
    usernameID             NUMBER (3) CONSTRAINT usernameID_nn NOT NULL ,
    orientationID          NUMBER (3) CONSTRAINT orientationID_nn NOT NULL ,
    rangeID                NUMBER (3) CONSTRAINT rangeID_nn NOT NULL ,
    skinColorID            NUMBER (3) CONSTRAINT skinColorID_nn NOT NULL ,
    hairColorID            NUMBER (2) CONSTRAINT hairColorID_nn NOT NULL ,
    religionID             NUMBER (2) CONSTRAINT religionID_nn NOT NULL ,
    zodiacSignID           NUMBER (2) CONSTRAINT zodiacSignID_nn NOT NULL ,
    relationshipStatusID   NUMBER (2) CONSTRAINT relationshipStatusID_nn NOT NULL ,
    bodyTypeID             NUMBER (1) CONSTRAINT bodyTypeID_nn NOT NULL ,
    exerciseFreqID         NUMBER (1) CONSTRAINT exerciseFreqID_nn NOT NULL ,
    cityID                 NUMBER (3) CONSTRAINT cityID_nn NOT NULL
  ) ;
  

  
  ALTER TABLE Person
        ADD CONSTRAINT PersonPK PRIMARY KEY ( personID )
        USING INDEX
        TABLESPACE ADMIN_Ind PCTFREE 20
        STORAGE ( INITIAL 10K NEXT 10K PCTINCREASE 0) ;
        
ALTER TABLE Person ADD CONSTRAINT Person_usernameID_FK FOREIGN KEY ( personID ) REFERENCES username ( usernameid ) ;

ALTER TABLE Person ADD CONSTRAINT Person_ageRangeCatalog_FK FOREIGN KEY ( rangeID ) REFERENCES ageRangeCatalog ( rangeID );

ALTER TABLE Person ADD CONSTRAINT Person_bodyTypeCatalog_FK FOREIGN KEY ( bodyTypeID ) REFERENCES bodyTypeCatalog ( bodyTypeID );

ALTER TABLE Person ADD CONSTRAINT Person_cityCatalog_FK FOREIGN KEY ( cityID ) REFERENCES cityCatalog ( cityID );

ALTER TABLE Person ADD CONSTRAINT Person_exerciseFreqCatalog_FK FOREIGN KEY ( exerciseFreqID ) REFERENCES exerciseFrequencyCatalog ( exerciseFreqID );

ALTER TABLE Person ADD CONSTRAINT Person_genderCatalog_FK FOREIGN KEY ( genderID ) REFERENCES genderCatalog ( genderID );

ALTER TABLE Person ADD CONSTRAINT Person_hairColorCatalog_FK FOREIGN KEY ( hairColorID ) REFERENCES hairColorCatalog ( hairColorID );

ALTER TABLE Person ADD CONSTRAINT Person_relationshipStatus_FK FOREIGN KEY ( relationshipStatusID ) REFERENCES relationshipStatusCatalog ( relationshipStatusID );

ALTER TABLE Person ADD CONSTRAINT Person_religionCatalog_FK FOREIGN KEY ( religionID ) REFERENCES religionCatalog ( religionID ) ;

ALTER TABLE Person ADD CONSTRAINT Person_sexualOrientation_FK FOREIGN KEY ( orientationID ) REFERENCES sexualOrientationCatalog ( orientationID ) ;

ALTER TABLE Person ADD CONSTRAINT Person_skinColor_FK FOREIGN KEY ( skinColorID ) REFERENCES skinColorCatalog ( skinColorID ) ;

ALTER TABLE Person ADD CONSTRAINT Person_username_FK FOREIGN KEY ( usernameID ) REFERENCES username ( usernameID ) ;

ALTER TABLE Person ADD CONSTRAINT Person_zodiacSignCatalog_FK FOREIGN KEY ( zodiacSignID ) REFERENCES zodiacSignCatalog ( zodiacSignID ) ;

alter table Person add FoundPartner number(1);

alter table Person add GotMarried number(1);

alter table Person add Drinker number(1);
