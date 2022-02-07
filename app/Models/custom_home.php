<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_home extends Model
{
    use HasFactory;
    protected $table = 'custom_home';
    protected $primaryKey = 'id';
    protected $fillable = ['mota_home', 'dong1', 'dong2','dong3','dong4'];
    public $timestamps = false;
}
