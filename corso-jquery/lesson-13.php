<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>Animate</title>
	<link href="stylesheets/style.css" rel="stylesheet" type="text/css">
	<style>
		body { width: 400px; margin: 100px auto; }
	</style>
</head>
<body>


<div class="box">
	<h2>Hi There</h2>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</div>

<p><button>FadeSlideToggle</button></p>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

(function() {
	var box = $('div.box');
	//Combine Slide and Fade Functions
	//http://css-tricks.com/snippets/jquery/combine-slide-and-fade-functions/

	$.fn.FadeSlideToggle = function(speed, fn) {
		// fadeToggle = opacity
		// slideToggle = height
		return $(this).animate({
			'height': 'toggle',
			'opacity': 'toggle'
		}, speed || 400, function() {
			$.isFunction(fn) && fn.call(this);
		});
	};

	$('button').on('click', function() {
		box.FadeSlideToggle(500);
	});

})();

</script>
</body>
</html>