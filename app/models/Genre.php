<?php


class Genre extends Eloquent
{

    protected $table = 'genres';

    protected $fillable = array('name', 'icon', 'status');
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	// protected $with = [ 'user' ];
	protected $with = [];

	public function posts()
	{
	    return $this->belongsToMany('Post');
	}

}
