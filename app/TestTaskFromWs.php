<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestTaskFromWs
 * @package App
 *
 * @property  string $name
 * @property integer $user_id
 * @property integer $id
 */


class TestTaskFromWs extends Model
{
    public $connection = null;
    /**
     * TestTaskFromWs constructor.
     */
    public function __construct(array $rawValues)
    {
        Model::__construct();
        $this->name = $rawValues['title'];
        $this->user_id = $rawValues['userId'];
        $this->id = $rawValues['id'];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}


