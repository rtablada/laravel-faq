@extends(Config::get('laravel-faq::views.layout'))
<?php $laravelFaqDir = 'packages/rtablada/laravel-faq/';?>

@section('content')
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
@stop

@section('scripts')
<?php
	echo HTML::script($laravelFaqDir.'js/app.js');
?>
@stop
