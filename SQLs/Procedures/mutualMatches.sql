create or replace procedure mutualMatches (pUserNameID in number, pName out sys_refcursor)as
begin
open pName for
       select p.firstname as FNAME, p.lastname1 AS LNAME, p.lastname2 AS LNAME2
       from person p
       where p.usernameid in (SELECT a.MatchedPerson
                              FROM   MatchedPersons a
                                     INNER JOIN MatchedPersons b
                                       ON a.matchedperson = b.matcher
                              WHERE  a.matcher = pUserNameID
                                     AND b.matchedperson = pUserNameID);
end;
