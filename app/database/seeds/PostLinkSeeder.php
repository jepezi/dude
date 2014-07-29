<?php

class PostLinkSeeder extends Seeder
{
    public function run()
    {

      DB::table('posts')->delete();

      $postlinks = [
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 1', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem1.jpg', 'status' => 1, 'created_at' => '2014-01-04 12:33:37','updated_at' => '2014-01-04 12:33:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 2', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem2.jpg', 'status' => 1, 'created_at' => '2014-01-04 12:34:37','updated_at' => '2014-01-04 12:34:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 3', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem3.jpg', 'status' => 1, 'created_at' => '2014-01-04 12:36:37','updated_at' => '2014-01-04 12:36:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 4', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem4.jpg', 'status' => 1, 'created_at' => '2014-02-04 12:41:37','updated_at' => '2014-02-04 12:41:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 5', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem5.jpg', 'status' => 1, 'created_at' => '2014-02-04 12:45:37','updated_at' => '2014-02-04 12:45:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 6', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem6.jpg', 'status' => 1, 'created_at' => '2014-02-04 12:48:37','updated_at' => '2014-02-04 12:48:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 7', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem7.jpg', 'status' => 1, 'created_at' => '2014-02-04 12:49:37','updated_at' => '2014-02-04 12:49:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 8', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem8.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:51:37','updated_at' => '2014-03-04 12:51:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 9', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem9.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:52:37','updated_at' => '2014-03-04 12:52:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 10', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem10.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:55:37','updated_at' => '2014-03-04 12:55:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 11', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem11.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:56:37','updated_at' => '2014-03-04 12:56:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 12', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem12.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:57:37','updated_at' => '2014-03-04 12:57:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 13', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem13.jpg', 'status' => 1, 'created_at' => '2014-03-04 12:58:37','updated_at' => '2014-03-04 12:58:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 14', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem14.jpg', 'status' => 1, 'created_at' => '2014-04-04 12:34:37','updated_at' => '2014-04-04 12:34:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 15', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem15.jpg', 'status' => 1, 'created_at' => '2014-05-04 12:34:37','updated_at' => '2014-05-04 12:34:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 16', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem16.jpg', 'status' => 1, 'created_at' => '2014-05-04 12:44:37','updated_at' => '2014-05-04 12:44:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 17', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem17.jpg', 'status' => 1, 'created_at' => '2014-06-04 12:34:37','updated_at' => '2014-06-04 12:34:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 18', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem18.jpg', 'status' => 1, 'created_at' => '2014-07-04 12:34:37','updated_at' => '2014-07-04 12:34:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 19', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem19.jpg', 'status' => 1, 'created_at' => '2014-07-04 12:36:37','updated_at' => '2014-07-04 12:36:37'],
      ['user_id' => 0, 'is_link' => 1, 'title' => 'test title 20', 'caption' => 'test caption', 'url' => 'http://google.com', 'p_title' => 'p title', 'p_description' => 'p description', 'p_images'=>'/uploads/post_links/lorem20.jpg', 'status' => 1, 'created_at' => '2014-07-04 12:44:37','updated_at' => '2014-07-04 12:44:37'],
      // array('id' => '1','date' => '2014-05-01 12:33:00','created_at' => '2014-05-04 12:33:37','updated_at' => '2014-05-04 12:33:37'),
      // array('id' => '2','date' => '2014-05-02 12:33:00','created_at' => '2014-05-04 12:33:37','updated_at' => '2014-05-04 12:33:37'),

      ];

      DB::table('posts')->insert( $postlinks );

    }

}