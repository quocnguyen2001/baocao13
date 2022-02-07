<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom extends Model
{
    use HasFactory;
    protected $table = 'tuybien';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'sdt', 'diachi','mota_lienhe'];
    public $timestamps = false;
}
