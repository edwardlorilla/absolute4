<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
class Track extends Model
{
    use DataViewer, RecordActivity;
    protected $fillable = ['user_id', 'po_number', 'quantity', 'data', 'completed', 'check', 'type', 'supplier_id','requisition_id', 'supply_id', 'receive_id', 'form_type', 'division_id'];
   protected $casts = [
       'data' => 'array'
   ];

    public static $columns =  [
        [
            'id' => 'check',
            'name' => 'Check'
        ],
        [
            'id' => 'type',
            'name' => 'TYPE'
        ],
        [
            'id' => 'created_at',
            'name' => 'Create at'
        ],
        [
            'id' => 'updated_at',
            'name' => 'Updated at'
        ]
    ];
    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }public function receive()
    {
        return $this->belongsTo(Receive::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'subject');
    }
    public function order()
    {
        return $this->morphOne(Order::class, 'subject');
    }
}
