create or replace procedure matchesIvegiven (pUserNameId in number, pName out sys_refcursor) as
begin
  open pName for
         select p.firstname as fname, p.lastname1 as lname1, p.lastname2 as lname2
         from person p, matchedpersons mp
         where mp.matcher = pUserNameId
         and p.usernameid = mp.matchedperson
         order by fname;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person not found:');

end;

