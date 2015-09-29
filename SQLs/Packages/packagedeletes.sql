create or replace package deletes is
    procedure personlanguage (pUserID in number, planguageID in varchar2);
  --delete the language that have the table languagesbyperson with parameters pUserID and planguageID
  
    procedure personhobbie (pUserID in number, phobbieID in number);
 --delete the hobie that have the table hobbiesbyperson with parameters pUserID and phobbieID
    
    procedure personinterests (pUserID in number, pinterestID in number);
 --delete the hobie that have the table interestsbyperson with parameters pUserID and pinterestID
    
 END deletes;
