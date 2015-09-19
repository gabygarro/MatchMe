create or replace procedure newUser (pUserEmail Varchar2, pPassword Varchar2,pUserTypeID number)
as
       BEGIN
         insert into username (userNameId,userEmail,userNamePassword,userTypeID)
         values(usernameId_seq.NEXTVAL, pUserEmail,pPassword,pUserTypeID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('UserName or Password error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
