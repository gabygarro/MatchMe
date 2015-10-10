CREATE OR REPLACE PROCEDURE getVisits (pVisited IN number, pVisitor OUT sys_refcursor) as
       BEGIN
         open pVisitor for
         select p.firstname as fname, p.lastname1 as lname1, p.lastname2 as lname2, to_char( v.logdate, 'DD-MON-YYYY HH24:MI:SS') as visitDate
         from person p, visitlog v
         where v.visitedperson = pVisited
         and v.visitor = p.usernameid
         order by visitDate desc;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person not found:');
       END;
       
       
       
      
