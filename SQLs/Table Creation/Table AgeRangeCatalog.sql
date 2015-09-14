CREATE TABLE ageRangeCatalog
  (
    rangeID  NUMBER (3) NOT NULL ,
    ageRange VARCHAR2 (6) NOT NULL
  );
  
ALTER TABLE ageRangeCatalog ADD CONSTRAINT ageRangePK PRIMARY KEY ( rangeID ) ;
