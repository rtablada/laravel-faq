<?php namespace Rtablada\LaravelFaq\Repositories;

use Rtablada\LaravelFaq\Faq;

class FaqRepositoryEloquent implements FaqRepository
{
	protected $faqModel;

	public function __construct(Faq $faqModel)
	{
		$this->faqModel = $faqModel;
	}

	public function newInstance(array $attributes = array())
	{
		if (!isset($attributes['rank'])) {
			$attributes['rank'] = 0;
		}
		return $this->faqModel->newInstance($attributes);
	}

	public function paginate($perPage = 0, $columns = array('*'))
	{
		$perPage = $perPage ?: Config::get('laravel-faq::pagination.length');
		return $this->faqModel->rankedWhere('answered', 1)->paginate($perPage, $columns);
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

	public function destroy($id)
	{
		return $this->faqModel->destroy($id);
	}
}
