<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    protected $table = 'country'; 

    protected $fillable = ['id', 'name', 'shortcut', 'flag','updated_at','deleted_at','created_at']; 
    use SoftDeletes;

}