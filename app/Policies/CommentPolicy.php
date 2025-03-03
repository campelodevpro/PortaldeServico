<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function update(User $user, Comment $comment): bool
    {
        return $comment->user()->is($user);
    }
    public function delete(User $user, Comment $comment): bool
    {
        // return $comment->user()->is($user);
        return $this->update($user, $comment);
    }


}
