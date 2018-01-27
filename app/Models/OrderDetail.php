<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'ops_orderdetail';
    public $timestamps = false;
    protected $fillable = ['OrderDetailID','OrderCode', 'ProductCode','QTY'];
}
