create or replace procedure visit (pVisitor in number, pVisited in number) as

begin 
  insert into visitlog(logNumber,logDate,visitor,visitedperson)
         values(visitlognumber_seq.nextval,sysdate, pVisitor,pVisited);
       Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('No Data found ');
   commit;


end;
