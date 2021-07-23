<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //<===

class Hacky extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at']; //<===

	//protected $guarded = []; // === OR ===
    protected $fillable = ['name','password','is_admin'];
    // write if this error => "Add [name] to fillable property to allow mass assignment on [App\Hacky]."
}
