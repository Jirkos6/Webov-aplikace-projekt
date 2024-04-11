<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car'; 

    protected $fillable = ['name', 'made', 'Company_id']; 

}