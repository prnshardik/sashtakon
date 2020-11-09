<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Email_template extends Model{
        use HasFactory;

        protected $table = 'email_templates';

        protected $fillable = ['key', 'title', 'subject', 'html'];
    }
