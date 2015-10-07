CREATE TABLE winkPerson
  (
    winkID           NUMBER (3) NOT NULL ,
    winker           NUMBER (5) NOT NULL ,
    winkedPerson     NUMBER (5) NOT NULL
  ) ;
ALTER TABLE winkPerson ADD CONSTRAINT winkPersonPK PRIMARY KEY ( winkID ) ;

ALTER TABLE winkPerson ADD CONSTRAINT winkPerson_winker_FK FOREIGN KEY ( winker ) REFERENCES Person ( personID ) ;

ALTER TABLE winkPerson ADD CONSTRAINT winkPerson_winkedPerson_FK FOREIGN KEY ( winkedPerson ) REFERENCES Person ( personID ) ;
