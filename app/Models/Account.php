<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
      'nationalid',
      'dateofbirth',
      'phonenumber',
      'gender',
      'image',
      'proofofresidency',
      'proofofincome',
      'photo',
      'user_id',
      'accountno'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
