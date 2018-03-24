<?php
use app\services\PostsService;

class PostsValidation
{
    public $postsService;

    public function __construct()
    {
        $this->postsService = new PostsService;
    }

    public function validation(array $data): bool
    {
        if (filter_var($data['url'], FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }

    public function chekUrl($url)
    {
        $this->postsService->chekUrl($url);
    }


}