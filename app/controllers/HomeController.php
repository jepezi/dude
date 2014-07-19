<?php

use Dude\Repositories\Post\PostRepository;

class HomeController extends BaseController {

	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		// $this->beforeFilter('auth');
		$this->postRepository = $postRepository;
	}

	public function index()
	{
		$posts = $this->postRepository->getManyBy('status', 1, ['genres']);
		return View::make('frontend.home.index', compact('posts'));
	}


}
