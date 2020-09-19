<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
	use SoftDeletes;

    protected $table = 'files';

    public $timestamps = true;

    protected $fillable = 	[
                                'name','directory_id'
    						];

}
