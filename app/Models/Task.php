<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','price','status','user_id'];

    // public functinoo payment(){
    //     retun $this->hasOne(Payment::class);
    // }
}
