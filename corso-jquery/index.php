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
	<ul id="menu">
		<li>primo</li>
		<li>secondo</li>
		<li>terzo
			<ul>
				<li>a</li>
				<li>b</li>
				<li class="none">c</li>
			</ul>
		</li>
		<li>quarto</li>
	</ul>

	<button data-file="day">day</button>
	<button data-file="night">night</button>

	<dl>
		<dt>domanda numero 1</dt>
		<dd>risposta numero 1</dd>
		<dt>domanda numero 2</dt>
		<dd>risposta numero 2</dd>
		<dt>domanda numero 3</dt>
		<dd>risposta numero 3</dd>
		<dt>domanda numero 4</dt>
		<dd>risposta numero 4</dd>
		<dt>domanda numero 5</dt>
		<dd>risposta numero 5</dd>
	</dl>

		<h2>click me</h2>
		<h2>click me</h2>
		<h2>click me</h2>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
//$("#menu li").addClass('test');
//$("#menu > li").addClass('test');
//$("#menu").children("li").addClass('test');
//$("#menu").children("li").children("ul").children("li").addClass('test');
//$("#menu li:first").addClass('test');
//$("#menu li:last").addClass('test');
//$("#menu li:first-child").addClass('test');
//$("#menu>li:nth-child(2)").addClass('test');
//$("#menu>li:eq(2)").addClass('test'); //la numerazione parte da 0.
//$("#menu>li:eq(2)").next().addClass('test');
//$("#menu>li:eq(2)").prev().addClass('test');
//$("#menu>li:eq(2)").parent().addClass('test-menu');
//$("li.none").parents("ul").addClass('test-border');
//$("li.none").closest("ul").addClass('test-border');


(function(){
	$("button").on('click',function(){
		//console.log ($(this).text());
		//console.log ($(this).attr('data-file'));
		//console.log ($(this).data('file'));
		var css = 'stylesheets/'+$(this).attr('data-file')+'.css';
		console.log(css);
		$('link.light').attr('href',css);
		var $this = $(this);
		$this .siblings('button')
					.removeAttr('disabled')
					.end()
					.attr('disabled','disabled')
	});
})();


(function(){
	var dd = $("dd");
	dd.hide();

	$('dd').filter(':nth-child(n+4)').addClass('hide');

	$('dl').on('mouseenter','dt', function(){
		$(this)
			.next()
				.slideDown(200)
				.siblings('dd')
					.slideUp(200)
	});
})();

(function(){
		//$("h2").bind( "click", function() {
	  /*$("h2").on( "click", function() {
			console.log('clicked on');
			$(this).clone(true).appendTo('.container');
		});*/
		//LIVE() -> assente da 1.8+
		$("div.container").delegate("h2", "click", function() {
			console.log('clicked del');
			$(this).clone(true).appendTo('.container');
		});


})();

(function(){
	$("h1").prepend('aggiunto prepend<br>');

	$("h1").append('<br>aggiunto append');

	$("h1").before('aggiunto before');

	$("h1").after('aggiunto after');
})();

</script>
</body>
</html>
