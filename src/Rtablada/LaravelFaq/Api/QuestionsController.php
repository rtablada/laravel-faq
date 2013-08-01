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
		$paginate = $this->faqRepo->paginate(Config::get('laravel-faq::pagination.length'));
		$faqs = $paginate->getCollection();

		return $faqs;
	}

	public function store()
	{
		$input = Input::only('question');

		if($input['question'] != null) {
			$faq = Faq::create($input);

			return $faq;
		} else {
			App::abort(500, 'Question was not saved');
		}
	}
}
