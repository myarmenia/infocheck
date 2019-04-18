<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name','link','type','documentable_id','documentable_type','isused'];

    public function documentable() {
        return $this->morphTo();
    }


}
