<?php

use Dude\Repositories\Gossip\GossipRepository;

class ContactController extends BaseController {

	protected $gossipRepository;

	public function __construct(GossipRepository $gossipRepository)
	{
		$this->gossipRepository = $gossipRepository;
	}

	public function tell()
	{
		return View::make('frontend.home.tell');
	}

	public function storeTell()
	{
		$gossip = $this->gossipRepository->create(Input::all());

		if($gossip)
		{
			return View::make('frontend.home.told');
		}

		return Redirect::back()->withInput()
								->withErrors($this->gossipRepository->errors());
	}


}
