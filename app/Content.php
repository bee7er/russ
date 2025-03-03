<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    /**
     * Update the model in the database.
     *
     * @param  array  $attributes
     * @return bool|int
     */
    public function update(array $attributes = [])
    {
        // check the html field and set it to null if it is set to a default value
        if ('<p><br></p>' == $attributes['html']) {
            $attributes['html'] = null;
        }

        return parent::update($attributes);
    }
}
