<?php namespace Dude\Uploader;

interface Uploader {

  /**
   * Create a new user entity
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function upload(array $data, $path);

}