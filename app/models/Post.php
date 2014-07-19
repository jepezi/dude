<?php


class Post extends Eloquent
{

    protected $table = 'posts';

    protected $fillable = array('title', 'slug', 'caption','type', 'url', 'p_title', 'p_description', 'p_images', 'status', 'is_link');
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	// protected $with = [ 'user' ];
	protected $with = [];

	public function tags()
	{
	    return $this->belongsToMany('Tag');
	}

	public function genres()
	{
	    return $this->belongsToMany('Genre');
	}

}
