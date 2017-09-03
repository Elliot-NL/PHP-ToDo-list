<?php
require_once 'app/init.php';
$itemsQuery = $db->prepare("
	SELELCT id, name, done
	FROM items
	WHERE user = :user
	");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
	]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
//echo '<pre>', print_r($items), '</pre>';
foreach ($items as $item) {
	echo $item->['name'], '<br>'; 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title>ToDo List</title>

	<title>Document</title>
	<link href = "http://fonts.googleapis.com/ccs?family=Open+Sans" rel="stylesheet">
	<link href = "http://fonts.googleapis.com/ccs?family=Shadows+Into+Light+Two" rel="stylesheet">
	<lint rel="stylesheet" href ="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="list">
		<h1 class="header">To do.</h1>
		<?php if (!empty($items)): ?>
		<ul class= "items">
			<?php foreach ($items as $item) ?>
				<li><span class = "item">Test</span>
					<a href="#" class="done-button">Mark as done</a>
				</li>
				<?php endforeach; ?>
			</ul>
	 	    <?php else: ?>
 	    	<p>You hanven't added any items yet</p>
 	    <?php endif; ?>
 		<form class ="item-add"=add.php" method="post">
 			<input type="text" name="name" placeholder="Type new item here:" class= "input" autocomplete = "off" required> 
 			<input type="submit" value="Add" classname="submit">
 		</form> 	
 	</div>
</body>
</html>
