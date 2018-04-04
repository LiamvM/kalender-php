<form action="<?= URL ?>kalender/editSave/<?= $data['id']?>" method="POST">
	<input type="text" name="person" placeholder="Naam" value="<?= $data['person']?>" autocomplete="off">
	<input type="number" name="day" placeholder="Dag" value="<?= $data['day']?>" autocomplete="off">
	<input type="number" name="month" placeholder="Maand" value="<?= $data['month']?>" autocomplete="off">
	<input type="number" name="year" placeholder="Jaar" value="<?= $data['year']?>" autocomplete="off">
	<input type="submit" name="">
</form>