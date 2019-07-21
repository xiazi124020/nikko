create view v_employee as select a.*, b.code_Name   from employee a left join code b on a.title = b.code_Index and b.code_Id = 2  where a.id <> 'admin'

