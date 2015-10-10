create or replace procedure userTypeCat (pUserTypeName Varchar2, puserTypeID number)
as
       BEGIN
         insert into userTypeCatalog (UserTypeName,userTypeID)
         values(pUserTypeName, puserTypeID);

       Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Type UserID error ' || puserTypeID);
        -- WHEN OTHERS THEN
          --    DBMS_OUTPUT.PUT_LINE ('Unexpected error');
            --  RAISE;
         commit;

       END;
