<?php namespace Rtablada\LaravelFaq;

use Rtablada\EloquentRankable\RankableModel as Eloquent;
use Config;

class Faq extends Eloquent
{

	protected $fillable = array(
		'question',
		'answer',
	);

	protected $metricWeights = array(
		'search' => 0.1,
		'answer' => 10
	);

	public function setAnswerAttribute($value)
	{
		$this->updateMetricAnswer();
		$this->attributes['answered'] = true;
		$this->attributes['answer'] = $value;
	}

	public function __construct(array $attributes = array())
	{
		$this->table = Config::get('laravel-faq::database.faq_table');

		if ( ! isset(static::$booted[get_class($this)]))
		{
			static::boot();

			static::$booted[get_class($this)] = true;
		}

		$this->setAttribute('rank', 0);

		$this->fill($attributes);
	}

	public function getConnection()
	{
		return static::resolveConnection('faq');
	}

}
