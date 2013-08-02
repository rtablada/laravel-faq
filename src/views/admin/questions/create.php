<?php $laravelFaqDir = 'packages/rtablada/laravel-faq/';?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>FAQ</title>

	<?php
		echo HTML::style($laravelFaqDir.'css/gumby.css');
		echo HTML::style($laravelFaqDir.'css/style.css');
		echo HTML::script($laravelFaqDir.'js/modernizr.js');
	?>
</head>
<body>
<div class="sixteen colgrid">
	<div class="row">
		<div class="sixteen columns">

			<form action="<?php echo URL::route('laravel-faq::admin.questions.store')?>" method="POST">
				<ul>
					<li class="field">
						<label for="question" class="inline two columns">Question:</label>
						<input type="text" class="input text" id="question" name="question" placeholder="question" value="<?php echo $input->question ?>">
					</li>
					<li class="field">
						<label for="answer" class="inline two columns">Answer:</label>
						<textarea class="input textarea" id="answer" name="answer" placeholder="answer" rows="2"><?php echo $input->answer ?></textarea>
					</li>
					<li class="field">
						<input type="submit" class="btn primary medium" value="Submit">
					</li>
					<li class="field">
						<div class="btn medium info sixteen columns">
							<a href="<?php echo URL::route('laravel-faq::admin.index') ?>">Go Back</a>
						</div>
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
<?php
	echo HTML::script($laravelFaqDir.'js/gumby.js');
	echo HTML::script($laravelFaqDir.'js/app.js');
?>

</body>
</html>
