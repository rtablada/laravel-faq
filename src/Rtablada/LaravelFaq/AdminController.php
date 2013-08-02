<?php namespace Rtablada\LaravelFaq;

use Rtablada\LaravelFaq\Repositories\FaqRepository;
use View;

class AdminController extends BaseController
{
	protected $faqRepo;

	public function __construct(FaqRepository $faqRepo)
	{
		$this->faqRepo = $faqRepo;
	}

	public function index()
	{
		$faqs = $this->faqRepo->all();

		return View::make('laravel-faq::admin.index', compact('faqs'));
	}
}
