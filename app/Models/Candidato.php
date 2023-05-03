<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidato extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $primaryKey = 'id';
	protected $table = 'candidato';

	public function candidaturas()
	{
		return $this->hasMany(Candidaturas::class, 'id_candidato', 'id');
	}
}