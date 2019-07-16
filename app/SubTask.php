<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubTask
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $task_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubTask whereUserId($value)
 * @mixin \Eloquent
 */
class SubTask extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
