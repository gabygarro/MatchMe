create or replace procedure insertEmailsByPerson ( pEmail varchar2, pPersonID number)
as
       BEGIN
         insert into emailsByPerson ( emailID, email, personID)
         values(EmailID_seq.Nextval,pEmail,pPersonID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Email ID error ');
         --WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
