create or replace procedure getNickName(pUserID in number, pNickName out date) as
       BEGIN
         select NickName 
         into pNickName
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
