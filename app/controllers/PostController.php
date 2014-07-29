<?php

use Dude\Presenters\Presenter;
use Dude\Presenters\PostPresenter;
use Dude\Repositories\Post\PostRepository;

class PostController extends BaseController {

	protected $postRepository;

	public function __construct(PostRepository $postRepository, Presenter $presenter)
	{
		// $this->beforeFilter('auth');
		$this->postRepository = $postRepository;
		$this->presenter = $presenter;
	}


	public function showOriginal($id)
	{
		// increment click and return url to redirect	
		$post = $this->postRepository->find($id, ['genres']);

		if($post)
		{
			$post = $this->presenter->model($post, new PostPresenter);
			// redirect to link url
			return View::make('frontend.post.show', compact('post'));
		}

		App::abort(404);
	}

	public function show($hash_id)
	{
		// decrypt the hashed id
		$array_id = Hasher::decrypt($hash_id);

		$id = array_shift($array_id);

		// increment click and return url to redirect	
		$post = $this->postRepository->find($id, ['genres']);

		if($post)
		{
			$post = $this->presenter->model($post, new PostPresenter);
			// redirect to link url
			return View::make('frontend.post.show', compact('post'));
		}

		App::abort(404);
	}

	public function index()
	{
		
	}


}
