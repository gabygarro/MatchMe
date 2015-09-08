CREATE TABLE username (
       usernameID       VARCHAR2(30) NOT NULL,
       usernamePassword VARCHAR2(30) NOT NULL,
       CONSTRAINT usernameIDPK PRIMARY KEY (usernameID)
)

INSERT INTO USERNAME (usernameID, usernamePassword)
VALUES ('usuario1', 'usuario1');

select * from username;
