<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vagas extends Model
{
	use HasFactory;
	use SoftDeletes;
	
	protected $primaryKey = 'id';
	protected $table = 'vagas';
}