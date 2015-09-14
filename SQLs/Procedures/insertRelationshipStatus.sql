create or replace procedure insertRelationShipStatusCat (pRelationShipStatusName varchar2)
as
       BEGIN
         insert into relationShipStatusCatalog (relationShipStatusID,relationShipName)
         values(RelationShipStatusID_seq.nextval,pRelationShipStatusName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Relationship Status ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
