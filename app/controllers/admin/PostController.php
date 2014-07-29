<?php namespace Controllers\Admin;

use Dude\Poster\LinkPoster;
use Input;
use Redirect;
use View;
use Illuminate\Support\Str;
use Dude\Repositories\Genre\GenreRepository;
use Dude\Repositories\Post\PostRepository;

class PostController extends \AdminController 
{

	protected $genreRepository;

	public function __construct(LinkPoster $linkPoster, GenreRepository $genreRepository, PostRepository $postRepository)
	{
		// $this->beforeFilter('auth');
		$this->linkPoster = $linkPoster;
		$this->genreRepository = $genreRepository;
		$this->postRepository = $postRepository;
	}

	public function storeLink()
	{
		$linkPost = $this->linkPoster->create(Input::all());

		if($linkPost)
		{
			return Redirect::route('admin.home');
		}

		return Redirect::back()->withInput()
								->withErrors($this->linkPoster->errors());
	}

	public function updateLink($id)
	{
		$post = $this->postRepository->update(array_merge(['id' => $id], Input::all()));

		if($post)
		{
		  return Redirect::route('admin.post.editLink', $id)->with('success', 'The post has been updated!');
		}

		return Redirect::route('admin.post.editLink', $id)->withInput()->withErrors($this->postRepository->errors());
	}

	public function editLink($id)
	{
		$post = $this->postRepository->find($id);
		$genres = $this->genreRepository->getManyBy('status', 1);

		if($post)
		{
		  return View::make('admin.post.editLink', compact('post', 'genres'));
		}

		App::abort(404);
	}


	public function createLink()
	{
        $genres = $this->genreRepository->getManyBy('status', 1);
        return View::make('admin.post.createLink', compact('genres'));
	}

	public function createLinkFromBookmarklet()
	{
		$url = Input::get('url');
        $p_title = Input::get('p_title');
        $slug = Str::slug($p_title);
        $p_description = Input::get('p_description');
        $p_images = Input::get('p_images');
        $imgarray = explode("|", $p_images);


        // $genres = $this->genreRepository->all();
        $genres = $this->genreRepository->getManyBy('status', 1);
        return View::make('admin.post.createLinkFromBookmarklet', compact('url', 'p_title', 'slug', 'p_description', 'genres'))->withimgarray($imgarray);
	}

}
