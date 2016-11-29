<?php

abstract class RNDEmployee  {
	private $id;
    private $name;
    private $position;	
    private $salary;
    private $sitting_location;	
    private $work_days;
    private $employment_start_date;	
	private $employment_end_date;	


	public function __construct (array $details) {
		$this->id = $detals['id'];
		$this->name = $details['name'];
		$this->position = $detals['position'];
		$this->salary = $details['salary'];
		$this->sitting_location = $detals['sitting_location'];
		$this->work_days = $detals['work_days'];
	}

	// no need setter for id because its defined once on costruct

	public function getName() {
		return $this->name;
	}
	public function getPosition() {
		return $this->position;
	}
	public function getSalary() {
		return $this->salary;
	}
	public function getSitting_location() {
		return $this->sitting_location;
	}
	public function getWork_days() {
		return $this->work_days;
	}	
	public function getEmployment_start_date() {
		return $this->employment_start_date;
	}
	public function getEmployment_end_date() {
		return $this->employment_end_date;
	}

	
	
	public function setName($name) {
		$this->name = $name;
		//echo $name;
		return $this;
	}
	public function setPosition($position) {
		$this->position = $position;
		return $this;
	}
	public function setSalary($salary) {
		$this->salary = $salary;
		return $this;
	}
	public function setSitting_location($sitting_location) {
		$this->sitting_location = $sitting_location;
		return $this;
	}
	public function setWork_days($work_days) {
		$this->work_days = $work_days;
		return $this;
	}
	public function setEmployment_start_date($employment_start_date) {
		$this->employment_start_date = $employment_start_date;
		return $this;
	}
	public function setEmployment_end_date($employment_end_date) {
		$this->employment_end_date = $employment_end_date;
		return $this;
	}



	public function hire ($employment_start_date) {
		$this->employment_start_date = $employment_start_date;//some date
		echo 'Hire Employee '.$this->name.'<br/>';
		return $this;
	}

	public function fire ($employment_end_date) {
		$this->employment_end_date = $employment_end_date;//some date
		echo 'Fire Employee '.$this->name.'<br/>';
		return $this;
	}

}




//example of usage



class QA extends RNDEmployee {

}

class Developer extends RNDEmployee {

}

class Tester extends RNDEmployee {

}

$qa1 = new QA(array(
	"id" => 1,
	"name" => "Alex",
	"position" => "Qa",
	"salary" => "1800",
	"sitting_location" => "office 13",
	"work_days" => "2"
	));
//ok so we have a candidate which passed the interview and we want to hire him :)
$qa1->hire('10/5/10');

//bad QA
$qa1->fire('15/5/10');




$dev1 = new Developer(array(
	"id" => 1,
	"name" => "Dima",
	"position" => "Developer",
	"salary" => "6800",
	"sitting_location" => "office 25",
	"work_days" => "2"
	));
//ok so we have a candidate which passed the interview and we want to hire him :)
$dev1->hire('15/9/20');












