PL/SQL Developer Test script 3.0
18
-- Created on 25/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  intereses sys_refcursor;
  interestsName varchar2(50);
  --myRecord userNameID%ROWTYPE;
begin
  -- Test statements here
  getPerson.interests(5, intereses);
  loop
     fetch intereses
     into interestsName;
          
      exit when intereses %notfound;
      dbms_output.put_line(interestsName);
  end loop;
  close intereses;
end;
0
0
