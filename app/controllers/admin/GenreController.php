<?php namespace Controllers\Admin;


use Input;
use Redirect;
use View;
use Illuminate\Support\Str;
use Dude\Repositories\Genre\GenreRepository;

class GenreController extends \AdminController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $genreRepository;

	public function __construct(GenreRepository $genreRepository)
	{
		$this->genreRepository = $genreRepository;
	}

	public function create()
	{
        // $genres = $this->genreRepository->all();
        return View::make('admin.genre.create');
	}

	public function store()
	{
		$genre = $this->genreRepository->create(Input::except('files'));

		if($genre)
		{
			return Redirect::route('admin.genre.create');
		}

		return Redirect::back()->withInput()
								->withErrors($this->genreRepository->errors());
	}

}
