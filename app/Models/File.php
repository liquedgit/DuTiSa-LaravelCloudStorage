<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $id = 'id';
    protected $traineecode = 'traineecode';
    protected $fillable = array('name', 'created_at', 'updated_at');

}
