<?php $laravelFaqDir = 'packages/rtablada/laravel-faq/';?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>FAQ</title>

	<?php
		echo HTML::script($laravelFaqDir.'js/modernizr.js');
		echo HTML::style($laravelFaqDir.'css/gumby.css');
		echo HTML::style($laravelFaqDir.'css/style.css');
	?>
</head>
<body>

	<div class="row">
		<div class="fourteen columns">
			<h1>Frequently Asked Questions</h1>

			<dl class="faqs">
				<div class="question">
					<dt>What is going on here?</dt>
					<dd>It is a cool thing.</dd>
				</div>
				<div class="question">
					<dt>What is going on here?</dt>
					<dd>It is a cool thing.</dd>
				</div>
				<div class="question">
					<dt>What is going on here?</dt>
					<dd>It is a cool thing.</dd>
				</div>
			</dl>
		</div>
	</div>

<?php
	echo HTML::script($laravelFaqDir.'js/gumby.js');
	echo HTML::script($laravelFaqDir.'js/ember.js');
	echo HTML::script($laravelFaqDir.'js/app.js');
?>

<script>
	$('.question').on('click', function(vent) {
		$this = $(this);
		$this.find('dd').slideToggle();
		$this.siblings('.question').find('dd').slideUp();
	});
</script>
</body>
</html>
