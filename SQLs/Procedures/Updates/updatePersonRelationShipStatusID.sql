Create or replace procedure updateP_RelationShipStatusID (pPersonID number, pRelationShipStatusID number)
as
       BEGIN        
           UPDATE Person
           SET RelationShipStatusID = pRelationShipStatusID
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
