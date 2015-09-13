CREATE TABLE userTypeCatalog
  (
    userTypeName VARCHAR2 (15) ,
    userTypeID   NUMBER (1) NOT NULL
  ) ;
ALTER TABLE userTypeCatalog ADD CONSTRAINT userTypeCatalogPK PRIMARY KEY ( userTypeID ) ;
