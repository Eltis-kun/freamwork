<?php

class PostsValidation
{

    public function validation(array $data): bool
    {
        if (filter_var($data['url'], FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }


}