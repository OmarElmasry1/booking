<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'user_id',
      'service_id',
      'time'
    ];

    public function User () {

       return  $this->belongsTo(User::class);
    }

    public function Service () {

        return  $this->belongsTo(Service::class);
     }

}
