<?php

require ROOT . "model/KalenderModel.php";

function index()
{
	render("kalender/index", array(
		"getData" => getAllData()
	));

	
}

function create()
{
	render("kalender/create");
	
}

function createSave()
{
	if (createBirthday() === true) {
		header("location:" . URL . "kalender/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function editSave($id)
{
	if (editBirthday($id) === true) {
		header("location:" . URL . "kalender/index");
	} else {
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	}
}

function edit($id)
{
	render("kalender/edit", array(
		"data" => getDataById($id)
	));

}

function delete($id)
{
	if (deletePerson($id)) {
		header("location:" . URL . "kalender/index");
		exit();
	} else {
		//er is iets fout gegaan..
		require(ROOT . 'controller/ErrorController.php');
		call_user_func('error_404');	
	
	}
}


