<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'user_id',
      'price',
      'description',
      'name'
    ];

    public function User () {

       return  $this->belongsTo(User::class);
    }


}
