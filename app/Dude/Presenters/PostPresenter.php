<?php namespace Dude\Presenters;

class PostPresenter extends AbstractPresenter implements Presentable {

  
  public function simplerurl()
  {
  	$url = $this->object->url;
  	$pieces = parse_url($url);
	$domain = isset($pieces['host']) ? $pieces['host'] : '';
	if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
		return $regs['domain'];
	}
	return false;
  }

}