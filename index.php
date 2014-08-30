<?php
/**
 * index/bootstrap file
 *
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
require_once ('lib/JsonLoader.php');
require_once ('lib/Trip.php');

$content = JsonLoader::load('data/cards.json');
$trip = new Trip($content);
$trip->setup();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trip sorter</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="page-header">
	<h1>Your journey <small>(sorted)</small></h1>
</div>
<ul class="list-group">
    <?php foreach ($trip->getCards() as $index => $card): ?>
	<li class="list-group-item"><?php echo sprintf("%d. %s", $index + 1, $card); ?></li>
	<?php endforeach; ?>
	<li class="list-group-item list-group-item-success"><?php echo $index + 2; ?>. You have arrived at your final destination.</li>
</ul>
</div>
</body>
</html>
