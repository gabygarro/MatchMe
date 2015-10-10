create or replace package find is

       procedure findName (pName in varchar2, pUserIDs  out sys_refcursor);
       procedure lastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor);
       procedure emailsByCity (pCityID in number, pEmails out sys_refcursor);
       procedure lastName (pLastName in varchar2, pUserIDs  out sys_refcursor);
       procedure nickName (pNickName in varchar2, pUserIDs  out sys_refcursor);
       procedure city (pCity in varchar2, pUserIDs  out sys_refcursor);
       procedure country (pCountry in varchar2, pUserIDs  out sys_refcursor);
       procedure hobbie (pHobbieID in varchar2, pUserIDs  out sys_refcursor);
       procedure ageRange (pAgeRangeID in varchar2, pUserIDs  out sys_refcursor);
       procedure interest (pInterestID in varchar2, pUserIDs  out sys_refcursor);
       procedure languages (planguageID in varchar2, pUserIDs  out sys_refcursor);
       procedure bodyType (pBodyTypeID in varchar2, pUserIDs  out sys_refcursor);
       procedure Exercisefrequency (pExercisefrequencyID in varchar2, pUserIDs  out sys_refcursor);
       procedure eyeColor (peyeColorID in varchar2, pUserIDs  out sys_refcursor);
       procedure gender (pgenderID in varchar2, pUserIDs  out sys_refcursor);
       procedure hairColor (pHairColorID in varchar2, pUserIDs  out sys_refcursor);
       procedure relationshipStatus (pRelationshipStatusID in varchar2, pUserIDs  out sys_refcursor);
       procedure religion (pReligionID in varchar2, pUserIDs  out sys_refcursor);
       procedure sexualOrientation (pSexualOrientationID in varchar2, pUserIDs  out sys_refcursor);
       procedure skinColor (pSkinColorID in varchar2, pUserIDs  out sys_refcursor);
       procedure zodiacSign (pZodiacSignID in varchar2, pUserIDs  out sys_refcursor);
       procedure foundPartner (pUserIDs  out sys_refcursor);
       procedure gotMarried (pUserIDs  out sys_refcursor);
       procedure top10MostWinked (pUserIDs  out sys_refcursor);
       procedure getPersonbyID (pUserID in number, pnames  out sys_refcursor);
       
 END find;
