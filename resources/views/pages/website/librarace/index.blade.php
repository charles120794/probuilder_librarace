<!DOCTYPE html>
<html>
	<head>
		<title> Librarace Admin </title>
		<link rel="stylesheet" type="text/css" href="{{ resource_path('pages/website/librarace/vendor/style.css') }}">
	</head>
	<body class="bodyBg">
		<header>
			<div class="container">
				<img src="stiLogo.png" class="stiLogo">
				<nav>
					<ul>
						<li><a href="#">HOME</a></li>
						<li><a href="booksdata.php">BOOKS DATA</a></li>
						<li><a href="rulesAndregulations.php">RULES AND REGULATIONS</a></li>
						<li><a href="aboutus.php">ABOUT US</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="homeDiv">
			<div>
				<img src="LibraRaceLogo.png" style="height:100px; width:450px; margin-top: 30px;">
			</div>
			<div>
				<form action="Home.php">
					<input type="search" class="searchBox" name="searchBooks" placeholder="Search book or author">
					<input type="submit" class="searchSubmitButton" name="submitSearch" value="search">
				</form>
			</div>
			<center>
				<div>
					<a href="/addbook" class="btn btnAddBookMargin add"> Add New Book </button>
				</div>
				<div>
					<a href="/addbanner" class="btn btnAddSlideMargin add"> Add New Slide </button>
				</div>
			</center>
		</div>
	</body>
</html>