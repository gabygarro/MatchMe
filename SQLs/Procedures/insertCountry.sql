create or replace procedure insertCountry (pCountryID varchar2, pCountryName varchar2)
as
       BEGIN
         insert into countryCatalog (countryID,countryName)
         values(pCountryID,pCountryName);

        Exception
         WHEN VALUE_ERROR THEN
              DBMS_OUTPUT.PUT_LINE ('Country error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
