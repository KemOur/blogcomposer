<?php

function postValidate($id)
{
    $post = getPostById($id);

    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return false;
    }

    return $post;
}
