<?php

abstract class RD_Employee{
	private $id;
    private $name;
    private $position;	
    private $salary;
    private $sitting_location;	
    private $work_days;
    private $employment_start_date;	
	private $employment_end_date;	
	
	// abstract protected function set($value);
	
	abstract protected function get($name);
	abstract protected function set($property,$value);
	
	abstract protected function hire($name,$position,$salary,$sitting_location,$work_days,$employment_start_date);
	abstract protected function fire($id,$employment_end_date);
}



	class Developer extends RD_Employee{
		
		public function get($name){
			 return $this->{$name};
		}	

		public function set($property, $value) {
			  $this->{$property} = $value;
			//  echo $value;
			return $this;
		}
			
		public function hire($name,$position,$salary,$sitting_location,$work_days,$employment_start_date){
			 $this->{'name'} = $name;
			 $this->{'position'} = $position;
			 $this->{'salary'} = $salary;
			 $this->{'sitting_location'} = $sitting_location;
			 $this->{'work_days'} = $work_days;
			 $this->{'employment_start_date'} = $employment_start_date;
			 return $this;
		}			

		public function fire($id,$employment_end_date){
			 $this->{'id'} = $id;// id emploeey getting from database
			 $this->{'employment_end_date'} = $employment_end_date;
			 return $this;
		}			
		
	}
	
	
	class Tester extends RD_Employee{
		
		public function get($name){
			 return $this->{$name};
		}	

		public function set($property, $value) {
			  $this->{$property} = $value;
			return $this;
		}		
		public function hire($name,$position,$salary,$sitting_location,$work_days,$employment_start_date){
			 $this->{'name'} = $name;
			 $this->{'position'} = $position;
			 $this->{'salary'} = $salary;
			 $this->{'sitting_location'} = $sitting_location;
			 $this->{'work_days'} = $work_days;
			 $this->{'employment_start_date'} = $employment_start_date;
			 return $this;
		}			

		public function fire($id,$employment_end_date){
			 $this->{'id'} = $id;// id emploeey getting from database
			 $this->{'employment_end_date'} = $employment_end_date;
			 return $this;
		}		
	}
	
	
	class System_Admin extends RD_Employee{
		
		public function get($name){
			 return $this->{$name};
		}	

		public function set($property, $value) {
			  $this->{$property} = $value;
			return $this;
		}	
		public function hire($name,$position,$salary,$sitting_location,$work_days,$employment_start_date){
			 $this->{'name'} = $name;
			 $this->{'position'} = $position;
			 $this->{'salary'} = $salary;
			 $this->{'sitting_location'} = $sitting_location;
			 $this->{'work_days'} = $work_days;
			 $this->{'employment_start_date'} = $employment_start_date;
			 return $this;
		}			

		public function fire($id,$employment_end_date){
			 $this->{'id'} = $id;// id emploeey getting from database
			 $this->{'employment_end_date'} = $employment_end_date;
			 return $this;
		}		
	}
	

	
	
$Developer = new Developer;

$Developer->hire('Joe','Tester','123','office 33','1','13/5/10');
$Developer->fire('4','22/10/15');


$Developer->set('id','1');
$Developer->set('name','joe');
$Developer->set('position','Developer');
$Developer->set('salary','123');
$Developer->set('sitting_location','office 13');
$Developer->set('work_days','13');
$Developer->set('employment_start_date','13/5/10');
$Developer->set('employment_end_date','13/10/10');
$dev = '<b>Developer</b><br/>';
$dev .= 'Name: '.$Developer->get('name'). '<br/>';
$dev .= 'Position: '.$Developer->get('position'). '<br/>';
$dev .= 'Salary: '.$Developer->get('salary'). '<br/>';
$dev .= 'Sitting location: '.$Developer->get('sitting_location'). '<br/>';
$dev .= 'Work days: '.$Developer->get('work_days'). '<br/>';
$dev .= 'Employment start date: '.$Developer->get('employment_start_date'). '<br/>';
$dev .= 'Employment end date: '.$Developer->get('employment_end_date'). '<br/><br/>';
echo $dev;

$Tester = new Tester;
$Tester->set('id','2');
$Tester->set('name','joe');
$Tester->set('position','Tester');
$Tester->set('salary','123');
$Tester->set('sitting_location','office 13');
$Tester->set('work_days','13');
$Tester->set('employment_start_date','13/5/10');
$Tester->set('employment_end_date','13/10/10');
$test = '<b>Tester</b><br/>';
$test .= 'Name: '.$Developer->get('name'). '<br/>';
$test .= 'Position: '.$Developer->get('position'). '<br/>';
$test .= 'Salary: '.$Developer->get('salary'). '<br/>';
$test .= 'Sitting location: '.$Developer->get('sitting_location'). '<br/>';
$test .= 'Work days: '.$Developer->get('work_days'). '<br/>';
$test .= 'Employment start date: '.$Developer->get('employment_start_date'). '<br/>';
$test .= 'Employment end date: '.$Developer->get('employment_end_date'). '<br/><br/>';
echo $test;

$System_Admin = new System_Admin;
$System_Admin->set('id','3');
$System_Admin->set('name','joe');
$System_Admin->set('position','System Admin');
$System_Admin->set('salary','123');
$System_Admin->set('sitting_location','office 13');
$System_Admin->set('work_days','13');
$System_Admin->set('employment_start_date','13/5/10');
$System_Admin->set('employment_end_date','13/10/10');
$sys_admin = '<b>System Admin</b><br/>';
$sys_admin .= 'Name: '.$Developer->get('name'). '<br/>';
$sys_admin .= 'Position: '.$Developer->get('position'). '<br/>';
$sys_admin .= 'Salary: '.$Developer->get('salary'). '<br/>';
$sys_admin .= 'Sitting location: '.$Developer->get('sitting_location'). '<br/>';
$sys_admin .= 'Work days: '.$Developer->get('work_days'). '<br/>';
$sys_admin .= 'Employment start date: '.$Developer->get('employment_start_date'). '<br/>';
$sys_admin .= 'Employment end date: '.$Developer->get('employment_end_date'). '<br/>';
echo $sys_admin;
?>