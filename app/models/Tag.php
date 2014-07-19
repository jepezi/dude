<?php


class Tag extends Eloquent
{

    protected $table = 'tags';

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
