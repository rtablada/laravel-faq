@extends(Config::get('laravel-faq::views.layout'))

<div class="sixteen colgrid">
	<div class="row">
		<div class="sixteen columns">

			<form action="<?php echo URL::route('laravel-faq::admin.questions.store')?>" method="POST">
				<ul>
					<li class="field">
						<label for="question" class="inline two columns">Question:</label>
						<input type="text" class="input text" id="question" name="question" placeholder="question" value="<?php echo isset($input['question']) ? $input['question'] : null ?>">
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
