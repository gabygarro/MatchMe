create or replace procedure checkPassword(pUserEmail IN varchar2,pUserNamePassword IN varchar2, pCheck OUT NUMBER) as

       BEGIN
         pCheck:= 0;
         SELECT 1 INTO pCheck
         FROM Username
         WHERE (pUserEmail = UserEmail and pUserNamePassword = userNamePassword);

         exception
           when no_data_found then
             pCheck:= 0;
        END;
