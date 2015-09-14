create or replace procedure insertHobbiesByPerson (pHobbieID number,pPersonID number)
as
       BEGIN
         insert into HobbiesByPerson (hobbieID,personID)
         values(pHobbieID,pPersonID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Hobbie ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
