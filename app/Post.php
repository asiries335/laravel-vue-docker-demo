<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель Post
 *
 * @property int    $id
 * @property string $title
 * @property int    $user_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'message',
    ];
}
