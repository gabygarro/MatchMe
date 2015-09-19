create or replace procedure updatePersonEyesColorID (pPersonID number, pEyesColorID number)
as
       BEGIN
           UPDATE Person
           SET EyesColorID = pEyesColorID
           WHERE pPersonID = personID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
