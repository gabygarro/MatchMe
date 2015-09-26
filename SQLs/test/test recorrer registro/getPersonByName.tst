PL/SQL Developer Test script 3.0
20
-- Created on 25/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  i integer;
  persona sys_refcursor;
  userNameID number(5);
  firstName varchar2 (50);
  --myRecord userNameID%ROWTYPE;
begin
  -- Test statements here
  getPersonByName('M', persona);
  loop
     fetch persona
     into userNameID,
          firstName;
      exit when persona %notfound;
      dbms_output.put_line(userNameID ||' | ' || firstName );
  end loop;
  close persona;
end;
0
0
