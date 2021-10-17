<?php

/**
 * Settings Model
 *

 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class ChatFilter extends Model
{
    protected $table    = 'chat_filter';
    public $timestamps  = false;

    protected $fillable = ['value'];

    public static function getAll()
    {
        $data = Cache::get('settings');
        if (empty($data)) {
            $data = parent::all();
            Cache::put('settings', $data, 1440);
        }
        return $data;
    }
}
