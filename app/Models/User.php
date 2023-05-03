<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;
	protected $primaryKey;
	protected $table;
    protected $prefixo;

    public function __construct()
    {
        $this->primaryKey = \App\Config::PRIMARY_KEY;
        $this->table = \App\Config::TABLE;
    }

}