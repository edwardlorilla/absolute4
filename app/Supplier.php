<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
class Supplier extends Model
{
    use DataViewer;
    protected $fillable = ['name', 'address'];
    public static $columns =  [

        [
            'id' => 'id',
            'name' => 'ID'
        ],
        [
            'id' => 'name',
            'name' => 'Name'
        ],[
            'id' => 'address',
            'name' => 'Address'
        ],
    ];
}
