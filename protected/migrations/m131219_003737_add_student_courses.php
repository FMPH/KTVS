<?php

class m131219_003737_add_student_courses extends CDbMigration
{
	public function safeUp()
	{
		$this->insert('tbl_student_course', array('student_id'=>'1','course_id'=>'2'));
		$this->insert('tbl_student_course', array('student_id'=>'2','course_id'=>'1'));
		$this->insert('tbl_student_course', array('student_id'=>'3','course_id'=>'3'));
		$this->insert('tbl_student_course', array('student_id'=>'1','course_id'=>'3'));
	}

	public function safeDown()
	{
		$this->delete('tbl_student_course');
	}
}
