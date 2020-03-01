<!DOCTYPE html>
<html>
<head>
	<title>
		LibraRace Admin
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyAddNewBook">

	<div class="newBookForm">
		<img src="owlLogo.png" class="owlLogoIn">
		<p class="LibraRace">Add new slide</p>
		<form method="post" action="AddNewSlide.php">
			<table align="center">
				<tr>
					<td>Import image</td>
					<td><input type="file" name="Slide image"></td>
				</tr>
				<tr>
					<td>Message</td>
					<td><input type="text" name="Message"></td>
				</tr>
			</table>
			<input type="reset" class="customizeButton resetMarginInNewSlide" name="reset" value="Reset">
			<input type="submit" class="customizeButton customizeButtonMargin" name="Customize" value="Customize">
			<center>
				<input type="submit" class="addBookButton" name="AddNewBook" value="Add Slide">
			</center>
		</form>
	</div>

</body>
</html>