CREATE TABLE username (
       usernameID       number(3) NOT NULL,
       email         varchar2(30) CONSTRAINT usernameemail_nn NOT NULL,
       CONSTRAINT usernameemail_unique UNIQUE(email),
       usernamePassword VARCHAR2(50) NOT NULL,
       CONSTRAINT usernameIDPK PRIMARY KEY (usernameID)
)
