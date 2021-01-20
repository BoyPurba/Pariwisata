<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    use softDeletes;

    protected $fillable = [
        'travel_packages_id', 'user_id', 'additional_visa',
        'transactional_total', 'transactional_status'
    ];

    protected $hidden = [

    ];

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
