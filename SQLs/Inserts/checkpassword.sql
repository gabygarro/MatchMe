CREATE OR REPLACE procedure checkPassword(pEmail IN varchar2,pPassword IN varchar2, pCheck OUT NUMBER) as
--       RETURN boolean IS pCheck  boolean;
       Checkpass number;
       BEGIN
         pCheck:= 0;
         SELECT 1 INTO pCheck
         FROM Username
         WHERE (pEmail = Email and pPassword = userNamePassword);
         
          --IF Checkpass = 1 THEN
          --   pCheck:= TRUE;
          --END IF;
         exception
           when no_data_found then
             pCheck:= 0;
         --end;    
        END;
      
