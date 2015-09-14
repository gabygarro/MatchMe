create or replace procedure insertCityCat(pcityID number, pCityName varchar2, pCountryID varchar2)
as
       BEGIN
         insert into cityCatalog (cityID,cityName,countryID)
         values(pcityID,pCityName,pCountryID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('City error ');
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
