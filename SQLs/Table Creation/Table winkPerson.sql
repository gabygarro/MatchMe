CREATE TABLE winkPerson
  (
    winker           NUMBER (5) NOT NULL ,
    winkedPerson     NUMBER (5) NOT NULL
  ) ;


ALTER TABLE winkPerson ADD CONSTRAINT winkPerson_winker_FK FOREIGN KEY ( winker ) REFERENCES Person ( usernameid ) ;

ALTER TABLE winkPerson ADD CONSTRAINT winkPerson_winkedPerson_FK FOREIGN KEY ( winkedPerson ) REFERENCES Person ( usernameid ) ;
