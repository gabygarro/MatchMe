create or replace procedure insertCityCat(pCityName varchar2, pCountryID varchar2)
as
       BEGIN
         insert into cityCatalog (cityid,cityName,countryID)
         values(cityID_seq.Nextval,pCityName,pCountryID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('City error ');
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
