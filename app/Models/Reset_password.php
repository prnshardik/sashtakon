<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Reset_password extends Model{
	    use HasFactory;

	    protected $table = 'reset_password';

	    protected $fillable = ['user_id', 'token', 'expire_time'];
	}
