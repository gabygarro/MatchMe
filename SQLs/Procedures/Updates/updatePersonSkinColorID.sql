Create or replace procedure updatePersonSkinColorID (pPersonID number, pSkinColorID number)
as
       BEGIN        
           UPDATE Person
           SET SkinColorID = pSkinColorID
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
