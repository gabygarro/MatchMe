create or replace procedure getPersonByLastName1 (pLastName1 in varchar2, pUserIDs  out sys_refcursor) as
begin
  open pUserIDs for
  select userNameID, firstName
  from person
  where pName = firstName or firstName like '%' || pName || '%'
  order by userNameID;
  
end getPersonByName;
