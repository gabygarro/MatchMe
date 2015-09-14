create or replace procedure insertSexualOrientationCat (pOrientationName varchar2)
as
       BEGIN
         insert into sexualOrientationCatalog (OrientationID,OrientationName)
         values(SexualOrientationID_seq.nextval,pOrientationName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Sexual Orientation ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
