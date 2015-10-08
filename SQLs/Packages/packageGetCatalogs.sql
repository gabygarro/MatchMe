create or replace package getcatalog is
       
    procedure zodiacSign(pZodiacSignCatalog  out sys_refcursor);      
    procedure ageRange(pAgeRangeCatalog  out sys_refcursor); 
    procedure bodyType (pBodyTypeCatalog  out sys_refcursor); 
    procedure exercisefrequency (pExerciseFrequencyCatalog  out sys_refcursor);  
    procedure eyeColor (pEyeColorCatalog  out sys_refcursor);  
    procedure gender (pGenderCatalog  out sys_refcursor);
    procedure hairColor (pHairColorCatalog  out sys_refcursor);  
    procedure hobbie (pHobbieCatalog  out sys_refcursor, pHobbie out number);
    procedure interest (pInterestCatalog  out sys_refcursor, pInterest out number);  
    procedure languages (pLanguageCatalog  out sys_refcursor, pLanguages out number);
    procedure relationShipStatus (pRelationShipStatusCatalog  out sys_refcursor);
    procedure religion (pReligionCatalog  out sys_refcursor);  
    procedure sexualOrientation (pSexualOrientationCatalog  out sys_refcursor);
    procedure skinColor (pSkinColorCatalog  out sys_refcursor);
    procedure userType (pUserTypeCatalog  out sys_refcursor);
    procedure City (pCountryName in varchar2, pcityCatalog  out sys_refcursor);
    procedure Country (pCountryCatalog  out sys_refcursor);
    procedure NumberofCountries (pNumberofCountries  out number); 
    procedure CityID (pcityName in varchar2, pcityID out Number);
    
    procedure zodiacSignCount(pcount  out number);
    
 
END getcatalog;
