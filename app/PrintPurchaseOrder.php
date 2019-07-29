<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
class PrintPurchaseOrder extends Model
{
    use DataViewer;
    protected $casts = [
        'data' => 'array',
    ];
    public static $columns = [
        [
            'id' => 'user.name',
            'name' => 'User Name'
        ],[
            'id' => 'data.division',
            'name' => 'Division'
        ],[
            'id' => 'data.date_release',
            'name' => 'Date Release'
        ],[
            'id' => 'data.date_print',
            'name' => 'Date Print'
        ],
    ];
    protected $fillable = ['data', 'user_id'];
    public function orders()
    {
        return $this->morphMany(Order::class, 'subject');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function division(){
        return $this->belongsTo(Division::class);
    }

}
