create or replace procedure updatePersonLastname1 (pPersonID number, pLastName1 varchar2)
as
       BEGIN
           UPDATE Person
           SET LastName1 = pLastName1
           WHERE pPersonID = personID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
