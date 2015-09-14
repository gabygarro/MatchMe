Create or replace procedure updatePersonUniversity (pPersonID number, pUniversity varchar2)
as
       BEGIN        
           UPDATE Person
           SET University = pUniversity
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
