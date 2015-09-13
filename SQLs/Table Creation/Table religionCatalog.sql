CREATE TABLE religionCatalog
  (
    religionID   NUMBER (2) NOT NULL ,
    religionName VARCHAR2 (50) NOT NULL
  ) ;
ALTER TABLE religionCatalog ADD CONSTRAINT religionCatalogPK PRIMARY KEY ( religionID ) ;
