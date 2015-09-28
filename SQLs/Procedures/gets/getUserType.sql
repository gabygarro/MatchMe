create or replace procedure getUserType(pUserID IN varchar2,pUserType OUT number) as
       BEGIN
         SELECT UserTypeID
         INTO pUserType
         FROM Username
         WHERE pUserID = UsernameID;
      END;
