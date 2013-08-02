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
		return $faq = $this->faqModel->rankedWhere('answered', 1)->paginate($perPage, $columns);
	}

	public function all($columns = array('*'))
	{
		return $this->faqModel->rankedAll($columns);
	}

	public function create(array $attributes)
	{
		return $this->faqModel->create($attributes);
	}

	public function find($id, $columns = array('*'))
	{
		return $this->faqModel->findOrFail($id, $columns);
	}

	public function updateWithIdAndInput($id, array $input)
	{
		$faq = $this->faqModel->find($id);
		return $faq->update($input);
	}
}
