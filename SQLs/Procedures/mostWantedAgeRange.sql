create or replace procedure mostWantedAgeRange(pNames out sys_refcursor) as
begin 
    open  pNames for
    select ar.agerange as AgeRange, count(*) as counter
    from agerangecatalog ar, person p
    where p.rangeid = ar.rangeid
    group by ar.agerange
    order by counter desc;
    

    
end;
