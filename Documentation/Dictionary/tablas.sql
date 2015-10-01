select table_name, column_name, data_type, data_length, last_analyzed
from dba_tab_columns
where owner = 'ADMINISTRATOR'
order by table_name;
