create or replace procedure getFirstName(pUserID in number, pFirstName out varchar2) as
       BEGIN
         select firstname into pFirstName
         from person where
         personID = pUserID;
       END;
