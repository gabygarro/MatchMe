CREATE TABLE genderCatalog
  (
    genderID NUMBER (3) NOT NULL ,
    gender   VARCHAR2 (8) NOT NULL
  ) ;
ALTER TABLE genderCatalog ADD CONSTRAINT GenderPK PRIMARY KEY ( genderID ) ;
