create or replace procedure newuser (pUsername Varchar2, pPassword Varchar2)
as
       BEGIN
         insert into username (usernameId,email,usernamepassword)
         values(usernameId_seq.NEXTVAL, pUsername,pPassword);

       --Exception
         --WHEN NO_DATA_FOUND THEN
              --DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || emailId);
        -- WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
