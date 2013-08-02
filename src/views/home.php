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


			<?php if($faqs->isEmpty()): ?>
			<div class="alert light">
				No questions have been asked, <a href="<?php echo URL::route('laravel-faq::questions.create')?>">ask one now</a>.
			</div>
			<?php else: ?>

			<dl class="faqs">
				<?php foreach ($faqs as $faq): ?>
					<div class="question">
						<dt><?php echo $faq->question ?></dt>
						<dd><?php echo $faq->answer ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>

			<div class="pages" style="float:right">
				<?php echo $faqs->links(); ?>
			</div>

			<div class="row">
				<p style="text-align:right;">
					Can't find your question? <a href="<?php echo URL::route('laravel-faq::questions.create')?>">Ask it now</a>.
				</p>
			</div>
			<?php endif; ?>
		</div>
	</div>

<?php
	echo HTML::script($laravelFaqDir.'js/gumby.js');
	echo HTML::script($laravelFaqDir.'js/app.js');
?>

</body>
</html>
