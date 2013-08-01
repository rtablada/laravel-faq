<?php namespace Rtablada\LaravelFaq\Repositories;

use Rtablada\LaravelFaq\Faq;

class FaqRepositoryEloquent implements FaqRepository
{
	protected $faqModel;

	public function __construct(Faq $faqModel)
	{
		$this->faqModel = $faqModel;
	}

	public function paginate($perPage = 15, $columns = array('*'))
	{
		return $this->faqModel->rankPaginate($perPage, $columns);
	}

	public function create(array $attributes)
	{
		return $this->faqModel->create($attributes);
	}
}
