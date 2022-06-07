<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Admin  extends Authenticatable
{
    use HasFactory;
    protected $table = "admin";
    protected $guarded = [];

    /* @var array
    */
   protected $fillable = [
       'name',
       'email',
       'password',
   ];

   /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
