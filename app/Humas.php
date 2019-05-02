<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Humas extends Model
{
    protected $fillable = [
    	'nama',
    	'keperluan',
    	'status',
    	'kontak',
    	'tgl_kunjungan',
    	'foto'
    ];

    protected $dates = [
    	'exit_at',
    	'created_at',
    	'updated_at'
    ];
}
