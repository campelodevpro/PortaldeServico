<?php

declare(strict_types= 1);

namespace App\Models;

use App\Events\CommentCreateEvent;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
class Comment extends Model
{

    protected $fillable = [
        'user_id','message'
    ] ;

    protected $dispatchesEvents = [
        'created' => CommentCreateEvent::class,
    ] ;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
