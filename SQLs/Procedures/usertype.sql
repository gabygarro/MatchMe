create or replace procedure userTypeCat (pUserTypeName Varchar2, puserTypeID number)
--insert in the table catalog of user type an user type 
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
