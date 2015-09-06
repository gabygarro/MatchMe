create or replace procedure insertEmail (pEmailId number, pEmail varchar2, pPersonId number)
as
       BEGIN
         insert into email (emailId,email,personId)
         values(pemailId, pEmail,pPersonId);
         
       --Exception
         --WHEN NO_DATA_FOUND THEN
              --DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || emailId);
        -- WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
