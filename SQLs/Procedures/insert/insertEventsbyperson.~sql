create or replace procedure inserteventsbyperson (pEventID number, pPersonID number)
as
       BEGIN
         insert into eventsbyperson (eventID,personID)
         values(pEventID,pPersonID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Event by Person error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
