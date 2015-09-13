CREATE TABLE exerciseFrequencyCatalog
  (
    exerciseFreqID   NUMBER (1) NOT NULL ,
    exerciseFreqName VARCHAR2 (30) NOT NULL
  ) ;
ALTER TABLE exerciseFrequencyCatalog ADD CONSTRAINT exerciseFrequencyCatalogPK PRIMARY KEY ( exerciseFreqID ) ;
