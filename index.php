<?php

class Person
{
	public $id;
	public $firstname;
	public $lastname;
	
	public function getById($id){ //dobavljanje korisnika preko id-ja
				
		$conn = mysqli_connect("localhost","root","","exercise");
		$res = mysqli_query($conn,"select * from persons where id = " . $id);
		$person_row = mysqli_fetch_row($res);
		$person = new Person;
		$person->id = $person_row[0];
		$person->firstname = $person_row[1];
		$person->lastname = $person_row[2];
		return $person;
	}
	
	public function Update(){ //azuriranje korisnika
		$conn = mysqli_connect("localhost","root","","exercise");
		mysqli_query($conn,"update persons set firstname='{$this->firstname}', lastname='{$this->lastname}', where id = {$this->id}");
	}
	
	public function Insert(){ //ubacivanje novog korisnika u bazu
		$conn = mysqli_connect("localhost","root","","exercise");
		mysqli_query($conn,"insert into persons VALUES (null,'{$this->firstname}','{$this->lastname}')");

	}
	
}

$nikola = new Person();
$nikola->insert('', 'Nikola', 'Ilic');
