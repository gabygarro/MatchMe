create or replace procedure insertParameter (pParameterID number, pParameterName varchar2, pParameterValue number, pParameterDescription varchar2)
as
       BEGIN
         insert into parameter (parameterID, parameterName, parameterValue, parameterDescription)
         values(pParameterID,pParameterName, pParameterValue, pParameterDescription);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Parameter ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
