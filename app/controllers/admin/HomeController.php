<?php namespace Controllers\Admin;

use Input;
use Redirect;
use View;
use Dude\Repositories\Post\PostRepository;

class HomeController extends \AdminController 
{

	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function index()
	{
		$posts = $this->postRepository->getManyBy('status', 1, ['genres']);
		return View::make('admin.home.index', compact('posts'));
	}

}
