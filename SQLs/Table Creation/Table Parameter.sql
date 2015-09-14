CREATE TABLE Parameter
  (
    parameterID          NUMBER (3) NOT NULL ,
    parameterName        VARCHAR2 (20) ,
    parameterValue       NUMBER (8) ,
    parameterDescription VARCHAR2 (30)
  );
ALTER TABLE Parameter ADD CONSTRAINT ParameterPK PRIMARY KEY ( parameterID ) ;
