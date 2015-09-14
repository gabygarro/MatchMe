create or replace procedure insertEvent ( pEventName varchar2, pEventDate date, pCityID number)
as
       BEGIN
         insert into event (eventID, eventName, eventDate, CityID)
         values(eventID_seq.Nextval,pEventName,pEventDate, pCityID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Event ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
