CREATE TABLE Person
  (
    personID           NUMBER (3) NOT NULL ,
    personName         VARCHAR2 (30) CONSTRAINT person_name_nn NOT NULL ,
    lastName1          VARCHAR2 (30) CONSTRAINT person_lastName1_nn NOT NULL ,
    lastName2          VARCHAR2 (30) ,
    birthday           DATE CONSTRAINT person_birthday_nn NOT NULL ,
    registerDate       DATE DEFAULT SYSDATE CONSTRAINT person_registerDate_nn NOT NULL ,
    nickname           VARCHAR2 (20) ,
    zodiacSign         VARCHAR2 (11) CONSTRAINT person_zodiacSign_nn NOT NULL ,
    gender             VARCHAR2 (1) CONSTRAINT person_gender_nn NOT NULL ,
    country            VARCHAR2 (2)CONSTRAINT person_country_nn NOT NULL ,
    address            VARCHAR2 (100) ,
    tagline            VARCHAR2 (200) ,
    education          VARCHAR2 (3) CONSTRAINT person_education_nn NOT NULL ,
    highSchool         VARCHAR2 (50) ,
    university         VARCHAR2 (50) ,
    workPlace          VARCHAR2 (50) ,
    salary             NUMBER (7) ,
    relationshipStatus VARCHAR2 (2)CONSTRAINT person_relationshipStatus_nn NOT NULL ,
    religion           VARCHAR2 (3) ,
    height             NUMBER (1,2)CONSTRAINT person_height_nn NOT NULL ,
    skinColor          VARCHAR2 (2)CONSTRAINT person_skinColor_nn NOT NULL ,
    eyeColor           VARCHAR2 (4)CONSTRAINT person_eyeColor_nn NOT NULL ,
    hairColor          VARCHAR2 (5)CONSTRAINT person_hairColor_nn NOT NULL ,
    bodyType           VARCHAR2 (5)CONSTRAINT person_bodyType_nn NOT NULL ,
    smoker             CHAR (1)CONSTRAINT person_smoker_nn NOT NULL ,
    drinker            VARCHAR2 (1)CONSTRAINT person_drinker_nn NOT NULL ,
    exerciseFrequency  VARCHAR2 (3)CONSTRAINT person_excerciseFrequency_nn NOT NULL ,
    kids               CHAR (1)CONSTRAINT person_kids_nn NOT NULL ,
    interestedKids     CHAR (1) CONSTRAINT person_interestedKids_nn NOT NULL ,
    likesPets          CHAR (1) CONSTRAINT person_likesPets_nn NOT NULL
  ) ;
  
ALTER TABLE Person
      ADD CONSTRAINT personPK PRIMARY KEY ( personID )
      USING INDEX
      TABLESPACE ADMIN_Ind PCTFREE 20
      STORAGE (INITIAL 10K NEXT 10K PCTINCREASE 0);
