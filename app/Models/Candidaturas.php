<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidaturas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $primaryKey = 'id';
	protected $table = 'candidaturas';

	public function vagas()
	{
		return $this->belongsTo(Vagas::class, 'id_vaga', 'id');
	}
}