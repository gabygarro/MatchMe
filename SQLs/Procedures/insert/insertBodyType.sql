create or replace procedure insertBodyTypeCat (pBodyTypeID number, pBodyTypeName varchar2)
as
       BEGIN
         insert into bodyTypeCatalog (BodyTypeID,BodyTypeName)
         values(pBodyTypeID,pBodyTypeName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Body Type ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
