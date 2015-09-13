CREATE TABLE Wink
  (
    winkId    NUMBER (3) NOT NULL ,
    visitedId NUMBER (3)
  );
ALTER TABLE Wink ADD CONSTRAINT Wink_PK PRIMARY KEY ( winkId ) ;
