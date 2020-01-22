<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attempt
 * @package App
 * @property Route  route
 * @property User   user
 * @property int    type
 * @property string comment
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Attempt extends Model
{
    const TRY = 0;
    const TOP = 1;
    const FLASH = 2;

    protected $fillable = ['route_id', 'comment', 'type'];

    public static function types()
    {
        return [
            self::TRY   => [
                'title' => __('Попытка'),
                'name'  => 'try',
            ],
            self::TOP   => [
                'title' => __('Топ'),
                'name'  => 'top',
            ],
            self::FLASH => [
                'title' => __('Флеш'),
                'name'  => 'flash',
            ],
        ];
    }

    public static function typeByName($name)
    {
        foreach (self::types() as $type => $info)
            if ($info['name'] == $name)
                return $type;
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeInfo()
    {
        return self::types()[$this->type];
    }
}
