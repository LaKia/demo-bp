<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<link href="stylesheets/style.css" rel="stylesheet" type="text/css">
	<link class="light" href="stylesheets/day.css" rel="stylesheet" type="text/css">
	<title>jQuery Plugins</title>
</head>
<body>

<a href="second.php">7.Creating-and-Appending-Content-to-DOM</a>

<h1>jQuery Plugins</h1>
<div class="container">

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
(function(){
	$("h1").prepend('aggiunto prepend<br>');

	$("h1").append('<br>aggiunto append');

	$("h1").before('aggiunto before');

	$("h1").after('aggiunto after');
})();

(function(){

})();

</script>
</body>
</html>

