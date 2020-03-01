<?php 



	include('connection.php');



	$sql = "SELECT * FROM category";

	$result = mysqli_query($conn, $sql);



	// 	else 
	// {
	//     echo "0 results";
	// }


	// mysqli_close($conn);



?>


<!DOCTYPE html>
<html>
<head>
	<title>
		LibraRace Admin
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bodyBg">

	<div class="newBookForm">

		<img src="owlLogo.png" class="owlLogoIn">

		<p class="LibraRace">Add new book</p>

		<form method="post" action="insertbook.php" enctype="multipart/form-data">
			<table align="center">
				<tr>
					<td>Category</td>
					<td>
						<select name="category_id">

							<?php 

								if( mysqli_num_rows($result) > 0) 
								{
								
								    while($row = mysqli_fetch_assoc($result)) 
								    {


										echo '<option value="' .$row['category_id']. '">' .$row['description']. '</option>';


								    }

								} 

							?>

						</select>
					</td>
				</tr>
				<tr>
					<td>Book Title</td>
					<td><input type="text" name="book_title"></td>
				</tr>
				<tr>
					<td>Author</td>
					<td><input type="text" name="book_author"></td>
				</tr>
				<tr>
					<td>Year Published</td>
					<td><input type="number" name="published_date"></td>
				</tr>
				<tr>
					<td>Published by</td>
					<td><input type="text" name="published_by"></td>
				</tr>
				<tr>
					<td>Location:</td>
					<td>
						<select name="shelf">
							<option value="Shelf 1">Shelf 1</option>
							<option value="Shelf 2">Shelf 2</option>
							<option value="Shelf 3">Shelf 3</option>
							<option value="Shelf 4">Shelf 4</option>
							<option value="Shelf 5">Shelf 5</option>
							<option value="Shelf 6">Shelf 6</option>
							<option value="Shelf 7">Shelf 7</option>
							<option value="Shelf 8">Shelf 8</option>
							<option value="Shelf 9">Shelf 9</option>
							<option value="Shelf 10">Shelf 10</option>
						</select>

						<select name="row">
							<option value="Row 1">Row 1</option>
							<option value="Row 2">Row 2</option>
							<option value="Row 3">Row 3</option>
							<option value="Row 4">Row 4</option>
							<option value="Row 5">Row 5</option>
							<option value="Row 6">Row 6</option>
							<option value="Row 7">Row 7</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Import image</td>
					<td><input type="file" name="book_image"></td>
				</tr>
			</table>
				<input type="reset" class="customizeButton resetMarginInNewSlide" name="reset" value="Reset">
				<center>
					<input type="submit" class="addBookButton" name="AddNewBook" value="Add Book">
				</center>
		</form>
	</div>

</body>
</html>