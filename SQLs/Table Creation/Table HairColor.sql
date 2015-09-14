CREATE TABLE hairColorCatalog
  (
    hairColorID NUMBER (2) NOT NULL ,
    hairColor   VARCHAR2 (30) NOT NULL
  ) ;
ALTER TABLE hairColorCatalog ADD CONSTRAINT hairColorCatalogPK PRIMARY KEY ( hairColorID ) ;
