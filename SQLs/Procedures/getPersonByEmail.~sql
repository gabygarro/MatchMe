create or replace procedure getPersonByLastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor) as
begin
  open pUserIDs for
  select userNameID, lastName2
  from person
  where pLastName2 = lastName2 or lastName1 like '%' || pLastName2 || '%'
  order by userNameID;

end getPersonByLastName2;
