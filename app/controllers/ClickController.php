<?php

use Dude\Repositories\Post\PostRepository;

class ClickController extends BaseController {

	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function to($hash_id)
	{
		// decrypt the hashed id
		$array_id = Hasher::decrypt($hash_id);

		$id = array_shift($array_id);

		// increment click and return url to redirect	
		$url = $this->postRepository->incrementAndReturnUrl($id, 'click_total');

		// redirect to link url
		return Redirect::away($url);
	}


}
