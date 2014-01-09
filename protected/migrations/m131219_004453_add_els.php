<?php

class m131219_004453_add_els extends CDbMigration
{
	public function safeUp()
	{
           $this->insert('tbl_el', array(
                 'name'=>'Večerná liga - florbal',
                'description'=>'Zabav sa po večeroch s hokejkou v ruke',
                'type'=>'1'));
            
            $this->insert('tbl_el', array(
                'name'=>'Večerná liga - volejbal',
                'description'=>'Zabav sa po večeroch s loptou',
                'type'=>'1'));
           
            $this->insert('tbl_el', array(
                'name'=>'Večerná liga - basketbal',
                'description'=>'Zabav sa po večeroch s loptou',
                'type'=>'1'));
           
            $this->insert('tbl_el', array(
                'name'=>'Vianočný turnaj - florbal',
                'description'=>'Jedinečná akcia zmerať si sily s inými.',
                'type'=>'0'));
            
            $this->insert('tbl_el', array(
                'name'=>'Mikulášsky turnaj - florbal',
                'description'=>'Jedinečná akcia zmerať si sily s inými.',
                'type'=>'0'));
            
	}

	public function safeDown()
	{
		$this->delete('tbl_el');
	}
}
