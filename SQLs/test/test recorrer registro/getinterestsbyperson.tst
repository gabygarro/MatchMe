PL/SQL Developer Test script 3.0
18
-- Created on 25/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  UsernameIDs sys_refcursor;
  interestsName varchar2(50);
  --myRecord userNameID%ROWTYPE;
begin
  -- Test statements here
  getPerson.interests(5, UsernameIDs);
  loop
     fetch persona
     into interestsName;
          
      exit when persona %notfound;
      dbms_output.put_line(interestsName);
  end loop;
  close persona;
end;
0
0
