PL/SQL Developer Test script 3.0
13
-- Created on 13/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  i integer;
begin
  -- Test statements here
     inserts.ExerciseFrequencyCat('Every day');
     inserts.ExerciseFrequencyCat('5 days');
     inserts.ExerciseFrequencyCat('2-4 days');
     inserts.ExerciseFrequencyCat('Once a week');    
     inserts.ExerciseFrequencyCat('Less than once a week');
     inserts.ExerciseFrequencyCat('Never');
end;
0
0
