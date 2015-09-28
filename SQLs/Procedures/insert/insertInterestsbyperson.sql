create or replace procedure insertInterestsbyperson (pInterestID number, pPersonID number)
as
       BEGIN
         insert into interestsbyperson (interestID,personID)
         values(pInterestID,pPersonID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Interests by Person error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
