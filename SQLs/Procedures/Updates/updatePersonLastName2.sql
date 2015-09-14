reate or replace procedure updatePersonLastname2 (pPersonID number, pLastName2 varchar2)
as
       BEGIN
           UPDATE Person
           SET LastName2 = pLastName2
           WHERE pPersonID = personID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
