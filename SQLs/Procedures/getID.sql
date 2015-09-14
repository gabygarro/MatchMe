CREATE OR REPLACE PROCEDURE getId(pEmail IN varchar2, identification OUT number) as
       BEGIN
         SELECT usernameId
         INTO identification
         FROM username
         WHERE pEmail = userEmail;
       END;
