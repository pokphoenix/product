<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table = 'mas_products';
    public $timestamps = false;
    protected $fillable = ['ProductCode','ProductName', 'ProductDescription','IsActive'];

    public static function GetID(){
    	$sql = "SELECT CONCAT(          
                DATE_FORMAT(NOW(), 'P%Y%m')
                ,LPAD(IFNULL(
                    (SELECT SUBSTR(id, 8 , 10)+1
                    FROM running_number
                    WHERE SUBSTR(id, 1 , 7)  = DATE_FORMAT(NOW(), 'P%Y%m')
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
