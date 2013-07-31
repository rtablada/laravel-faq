<?php namespace Rtablada\LaravelFaq\Api;

use Rtablada\LaravelFaq\BaseController;
use Rtablada\LaravelFaq\Faq;
use Config;

class QuestionsController extends BaseController
{
	public function __construct()
	{

	}

	public function index()
	{
		$paginate = Faq::paginate(Config::get('laravel-faq::pagination.length'));
		$faqs = $paginate->getCollection();

		return $faqs;
	}

	public function store()
	{
		$input = array(
			'question' => 'How do I make this work?',
			'answer' => 'With a stick of dynamite.'
		);

		$faq = Faq::create($input);

		return $faq;
	}
}
