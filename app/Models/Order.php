<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
    protected $table = 'ops_order';
    public $timestamps = false;
    protected $fillable = ['OrderCode','CustomerCode', 'OrderDate','IsActive'];


    public static function GetID(){
    	$sql = "SELECT CONCAT(          
                DATE_FORMAT(NOW(), 'O%Y%m')
                ,LPAD(IFNULL(
                    (SELECT SUBSTR(id, 8 , 10)+1
                    FROM running_number
                    WHERE SUBSTR(id, 1 , 7)  = DATE_FORMAT(NOW(), 'O%Y%m')
                    ORDER BY id DESC
                    LIMIT 1
                    ),1
                ),4,'0')) as id" ;
        $id = collect(DB::select(DB::raw($sql)))->first()->id;
        $sql = "INSERT INTO running_number (id) VALUE ('$id')" ;
        DB::insert(DB::raw($sql));
        return $id ;
    }
}
