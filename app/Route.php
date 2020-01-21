<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Route
 * @package App
 * @property int     group_id
 * @property string  title
 * @property Grade   grade
 * @property User    author
 * @property boolean easier
 * @property string  color
 * @property array   marks
 */
class Route extends Model
{
    protected $casts = [
        'easier' => 'boolean',
        'marks'  => 'array',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
