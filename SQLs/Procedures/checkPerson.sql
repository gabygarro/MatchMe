create or replace procedure checkPerson(pUserID IN number, pCheck OUT NUMBER) as

       BEGIN
         pCheck:= 0;
         SELECT 1 INTO pCheck
         FROM person p
         WHERE pUserID = p.usernameid;

         exception
           when no_data_found then
             pCheck:= 0;
        END;
