PL/SQL Developer Test script 3.0
19
-- Created on 25/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  i integer;
  persona sys_refcursor;
  userNameID number(5);
  --myRecord userNameID%ROWTYPE;
begin
  -- Test statements here
  getPersonByName('M', persona);
  loop
     fetch persona
     into userNameID,
          
      exit when persona %notfound;
      dbms_output.put_line(userNameID);
  end loop;
  close persona;
end;
0
0
