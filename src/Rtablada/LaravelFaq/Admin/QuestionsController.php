<?php namespace Rtablada\LaravelFaq\Admin;

use Rtablada\LaravelFaq\Repositories\FaqRepository;
use Rtablada\LaravelFaq\BaseController;
use View, Input, Session, Redirect;

class QuestionsController extends BaseController
{
	protected $faqRepo;

	public function __construct(FaqRepository $faqRepo)
	{
		$this->faqRepo = $faqRepo;
	}

	public function create()
	{
		$input = Session::getOldInput();

		return View::make('laravel-faq::admin.questions.create', compact('input'));
	}

	public function store()
	{
		$input = Input::all();

		if ($this->faqRepo->create($input)) {
			Session::flash('success', 'Your Question Has Been Updated');
			return Redirect::route('laravel-faq::admin.index');
		} else {
			return Redirect::back()->withInput();
		}
	}

	public function edit($id)
	{
		$faq = $this->faqRepo->find($id);

		return View::make('laravel-faq::admin.questions.edit', compact('faq'));
	}

	public function update($id)
	{
		$input = Input::only('question', 'answer');
		if ($this->faqRepo->updateWithIdAndInput($id, $input)) {
			Session::flash('success', 'Your Question Has Been Updated');
			return Redirect::route('laravel-faq::admin.index');
		} else {
			return Redirect::back()->withInput();
		}
	}

	public function destroy($id)
	{
		$this->faqRepo->destroy($id);
		Session::flash('success', 'Your Question Has Been Deleted');
		return Redirect::route('laravel-faq::admin.index');
	}
}
