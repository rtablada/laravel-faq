<?php namespace Rtablada\LaravelFaq\Api;

use Rtablada\LaravelFaq\BaseController;
use Rtablada\LaravelFaq\Repositories\FaqRepository;
use Config;

class QuestionsController extends BaseController
{
	protected $faqRepo;

	public function __construct(FaqRepository $faqRepo)
	{
		$this->faqRepo = $faqRepo;
	}

	public function index()
	{
		return $this->faqRepo->paginate(Config::get('laravel-faq::pagination.length'), array('question', 'answer'));
	}

	public function all()
	{
		return $this->faqRepo->all(array('question'));
	}

	public function store()
	{
		$input = Input::only('question', 'answer');

		if($input['question'] != null) {
			$faq = Faq::create($input);

			return $faq;
		} else {
			App::abort(500, 'Question was not saved');
		}
	}

	public function search()
	{
		if (Input::has('q')) {
			return $this->faqRepo->search(Input::get('q'));
		}
		return App::abort(500, 'No query string');
	}

	public function show($id)
	{
		return $this->faqRepo->find($id);
	}

	public function destroy($id)
	{
		$faq = $this->faqRepo->find($id);
		$faq->delete();
	}
}
