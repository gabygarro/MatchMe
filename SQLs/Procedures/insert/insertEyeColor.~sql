create or replace procedure insertEyeColorCat (pEyeColor varchar2)
as
       BEGIN
         insert into eyeColorCatalog (EyeColorID,EyeColor)
         values(EyeColorID_seq.Nextval,pEyeColor);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Eye Color ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
