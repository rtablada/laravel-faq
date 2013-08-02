<?php namespace Rtablada\LaravelFaq;

use Rtablada\LaravelFaq\Repositories\FaqRepository;
use View;

class QuestionsController extends BaseController
{
	protected $faqRepo;

	public function __construct(FaqRepository $faqRepo)
	{
		$this->faqRepo = $faqRepo;
	}

	public function index()
	{
		$faqs = $this->faqRepo->paginate();

		return View::make('laravel-faq::home', compact('faqs'));
	}
}
