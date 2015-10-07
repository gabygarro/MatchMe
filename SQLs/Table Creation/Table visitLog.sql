CREATE TABLE visitLog
  (
    logNumber        NUMBER (8) NOT NULL ,
    logDate          DATE NOT NULL ,
    visitor          NUMBER (5) NOT NULL ,
    visitedPerson    NUMBER (5) NOT NULL
  ) ;
ALTER TABLE visitLog ADD CONSTRAINT visitLogPK PRIMARY KEY ( logNumber ) ;

ALTER TABLE visitLog ADD CONSTRAINT visitLog_visitor_FK FOREIGN KEY ( visitor ) REFERENCES Person ( personID ) ;

ALTER TABLE visitLog ADD CONSTRAINT visitLog_visitedPerson_FK FOREIGN KEY ( visitedPerson ) REFERENCES Person ( personID );
