<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    protected $table = 'car'; 

    protected $fillable = ['name', 'made', 'Company_id','updated_at','deleted_at','created_at']; 

    use SoftDeletes;

}