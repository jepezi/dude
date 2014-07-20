<?php


class Gossip extends Eloquent
{

    protected $table = 'gossips';

    protected $fillable = array('from', 'url', 'caption');
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	// protected $with = [ 'user' ];
	protected $with = [];

}
