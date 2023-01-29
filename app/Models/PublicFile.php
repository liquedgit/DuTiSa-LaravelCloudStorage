<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicFile extends Model
{
    use HasFactory;
    protected $table = 'public_files';
    protected $id = 'id';
    protected $fillable = array('name', 'created_at', 'updated_at');
}
