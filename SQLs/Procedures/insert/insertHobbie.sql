create or replace procedure insertHobbieCat (pHobbieName varchar2)
as
       BEGIN
         insert into hobbieCatalog (HobbieID,HobbieName)
         values(HobbieID_seq.nextval,pHobbieName);

        Exception
         WHEN VALUE_ERROR THEN
              DBMS_OUTPUT.PUT_LINE ('Hobbie ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
