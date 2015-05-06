<?php
define('cms','1');
include_once("components/db.php");
include_once("components/function.php");
$ncms = new system();

$menu = $db->query('SELECT id,name FROM menu'); // Odpowiedzialny za menu

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css">
		<title>TYTUŁ</title>
	</head>
	<body>

		<div id="header">
			<div id="content">
				<a href="index.php"><div id="logo">Home</div></a>
				<div id="empty"></div>
				<div id="menu">
				<ul>

				<?php
				foreach($menu as $pozycje) {
				echo '<a href="index.php?id='.$pozycje['id'].'"><li>'.htmlspecialchars($pozycje['name']).'</li></a>'; // Menu
				}
				?>

				</ul>
				</div>
			</div>
		</div>

		<div id="top"><br><br><br>
			<div id="top-text1">
				<?php
				echo $ncms->content('name'); // Dane o stronie, kolumna "name"
				?>
			</div>

			<div id="top-text2">
				<?php
				echo $ncms->content('opis'); // Dane o stronie, kolumna "opis"
				?>
			</div>
		</div>

		<div id="content_site"><br><br>
			<div id="content2">

				<div id="site">
					<?php
					echo $ncms->content('tresc'); // Dane o stronie, kolumna "tresc"

					if(isset($_GET['post']) && !isset($_GET['id'])) { // Sprawdzanie czy chcemy otworzyć newsa
						echo 'Tu będzie funkcja wyświetlająca newsy.';
					} else {
						echo $ncms->newsy(); // Newsy
					}
					?>
				</div>

				<div id="sidebar">
					Ostatnie posty<br><br>
					<?php
					echo $ncms->sidebar(); // Treść paska bocznego
					?>

				</div>

			</div>
		</div>

		<div id="foot">
			<p>© 2015 Kamil R, nCMS - <a href="http://localhost/ncms/admin/">Admin</a></p>
		</div>

	</body>
</html>
