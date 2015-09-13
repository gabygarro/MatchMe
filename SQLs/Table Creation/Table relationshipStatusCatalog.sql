CREATE TABLE relationshipStatusCatalog
  (
    relationshipStatusID NUMBER (2) NOT NULL ,
    relationshipName     VARCHAR2 (30) NOT NULL
  ) ;
ALTER TABLE relationshipStatusCatalog ADD CONSTRAINT relationshipStatusCatalogPK PRIMARY KEY ( relationshipStatusID ) ;
