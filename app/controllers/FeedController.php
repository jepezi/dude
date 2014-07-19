<?php

use Dude\Repositories\Post\PostRepository;

class FeedController extends BaseController {

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        // $this->beforeFilter('auth');
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        // creating rss feed with our most recent 20 posts
        // $posts = DB::table('posts')->orderBy('created', 'desc')->take(20)->get();
        $posts = $this->postRepository->getFeed();

        $feed = Feed::make();

        // set your feed's title, description, link, pubdate and language
        $feed->title = 'Dude DB';
        $feed->description = 'ดู๊ดดีบีทุกวัน';
        $feed->logo = 'http://dudedb.com/assets/images/logo_dudedb.png';
        $feed->link = URL::to('feed');
        $feed->pubdate = $posts[0]->created_at;
        $feed->lang = 'en';

        foreach ($posts as $post)
        {
            // set item's title, author, url, pubdate, description and content
            $feed->add($post->title, 'DudeDB', URL::route('click.to', Hasher::encrypt($post->id) ), $post->created_at, $post->caption);
        }

        // show your feed (options: 'atom' (recommended) or 'rss')
        return $feed->render('atom');

        // show your feed with cache for 60 minutes
        // second param can be integer, carbon or datetime
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom', 60);

        // to return your feed as a string set second param to -1
        $xml = $feed->render('atom', -1);
    }


}
