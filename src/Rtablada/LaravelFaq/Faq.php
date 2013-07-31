<?php namespace Rtablada\LaravelFaq;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Config;

class Faq extends Eloquent
{
	protected $fillable = array(
		'question',
		'answer',
	);

	public function __construct(array $attributes = array())
	{
		$this->table = Config::get('laravel-faq::database.faq_table');
		parent::__construct($attributes);
	}

}
