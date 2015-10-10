create or replace procedure Email(pUserID IN number, pEmail OUT varchar2) as
--using the parameter pUserID find and return in the parameter pEmail the email of this person
       BEGIN
         SELECT UserEmail
         INTO pEmail
         FROM Username
         WHERE pUserID = UsernameID;
      END;
