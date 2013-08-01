<?php namespace Rtablada\LaravelFaq\Repositories;

interface FaqRepository
{
	public function paginate($perPage = 15, $columns = array('*'));

	public function create(array $attributes);
}
