create or replace procedure insertSkinColorCat (pSkinColor varchar2)
as
       BEGIN
         insert into skinColorCatalog (skinColorID,skinColor)
         values(SkinColorID_seq.Nextval,pSkinColor);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Skin Color ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
