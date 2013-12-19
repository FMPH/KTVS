<?php

class m131219_005416_add_student_els extends CDbMigration
{
	public function safeUp()
	{
		
            $this->insert('tbl_student_el', array('student_id'=>'1','el_id'=>'1'));
           
            $this->insert('tbl_student_el', array('student_id'=>'2','el_id'=>'2'));
            
            $this->insert('tbl_student_el', array('student_id'=>'3','el_id'=>'3'));
            
            $this->insert('tbl_student_el', array('student_id'=>'2','el_id'=>'1'));
            
            $this->insert('tbl_student_el', array('student_id'=>'1','el_id'=>'4'));
            
	}

	public function safeDown()
	{
		$this->delete('tbl_student_el');
	}
}
