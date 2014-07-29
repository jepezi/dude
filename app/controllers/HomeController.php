<?php

use Dude\Presenters\Presenter;
use Dude\Presenters\PostPresenter;
use Dude\Repositories\Post\PostRepository;

class HomeController extends BaseController {

	protected $postRepository;

	public function __construct(PostRepository $postRepository, Presenter $presenter)
	{
		$this->beforeFilter('auth', array('except' => ['comeonin']));
		$this->postRepository = $postRepository;
		$this->presenter = $presenter;
	}

	public function index()
	{
		// $posts = $this->postRepository->getManyBy('status', 1, ['genres']);
		$page = Input::get('page', 1);
		$data = $this->postRepository->getByPage($page, 5, ['genres']);
		$posts = Paginator::make($data->items, $data->totalItems, 5);
		$posts = $this->presenter->paginator($posts, new PostPresenter);
		return View::make('frontend.home.index', compact('posts'));
	}

	public function comeonin()
	{
		if (Auth::user())
	    {
	      return Redirect::route('home');
	    }

	    return View::make('frontend.home.comeonin');
	}


}
