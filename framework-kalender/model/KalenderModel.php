<?php 

function getAllData()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `birthdays` ORDER BY `month`, `day`, `year`";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function deletePerson($id)
{
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `birthdays` WHERE `id` = :id";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":id" => $id 
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function createBirthday() 
{
	$person = isset($_POST ['person']) ? $_POST['person'] : null;
	$day = isset($_POST ['day']) ? $_POST['day'] : null;
	$month = isset($_POST ['month']) ? $_POST['month'] : null;
	$year = isset($_POST ['year']) ? $_POST['year'] : null;

	if ($person === null || $day === null || $month === null || $year === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO `birthdays`(person, day, month, year) VALUES (:person, :day, :month, :year)";
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":person"=>$person, ":day"=>$day, ":month"=>$month, ":year"=>$year
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}

function getDataById($id) {
	$db = openDatabaseConnection();
	$sql = ("SELECT id, person, day, month, year FROM `birthdays` WHERE `id` = :id");
	$query = $db->prepare($sql);
	$query->execute(array(
		":id"=>$id
	));
	return $query->fetch(PDO::FETCH_ASSOC);
}

function editBirthday($id)
{
	$person = isset($_POST ['person']) ? $_POST['person'] : null;
	$day = isset($_POST ['day']) ? $_POST['day'] : null;
	$month = isset($_POST ['month']) ? $_POST['month'] : null;
	$year = isset($_POST ['year']) ? $_POST['year'] : null;

	if ($person === null || $day === null || $month === null || $year === null) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = ("UPDATE `birthdays` SET person = :person, day = :day, month = :month, year = :year WHERE `id` = :id");
	$query = $db->prepare($sql);
	if ($query->execute(array(
		":person"=>$person, ":day"=>$day, ":month"=>$month, ":year"=>$year, ":id"=>$id
	))) {
		return true;
	} else {
		return false;
	}
	$db = null;
	return true;
}