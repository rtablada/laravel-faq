<?php namespace Rtablada\LaravelFaq;

use Rtablada\LaravelFaq\Repositories\FaqRepository;
use View, Session, Redirect, Input;

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

	public function create()
	{
		$input = Session::getOldInput();

		return View::make('laravel-faq::questions.create', compact('input'));
	}

	public function store()
	{
		$input = Input::all();

		if ($this->faqRepo->create($input)) {
			Session::flash('success', 'Your Question Has Been Updated');
			return Redirect::route('laravel-faq::index');
		} else {
			return Redirect::back()->withInput();
		}
	}
}
