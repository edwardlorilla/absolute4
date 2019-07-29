<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
class Transaction extends Model
{
    use DataViewer;
    /*protected static function boot(){
        parent::boot();
        static::created(function ($transaction) {

        });
    }*/
    protected $fillable = ['po_number', 'quantity', 'data', 'completed', 'purchaseorder_id', 'out_quantity', 'product_id', 'user_id', 'type', 'expiry_date', 'is_expired_within', 'date_delivered'];
    protected $casts = [
      'data' => 'array'
    ];
    public static $columns = [

        [
            'id' => 'id',
            'name' => 'ID'
        ],
        [
            'id' => 'order.po_number',
            'name' => 'PO #'
        ],
        [
            'id' => 'type',
            'name' => 'Type'
        ],
        [
            'id' => 'user.name',
            'name' => 'Users'
        ],
        [
            'id' => 'out_quantity',
            'name' => 'Quantity'
        ],
        [
            'id' => 'product.medicine.name',
            'name' => 'Products'
        ],
        [
            'id' => 'product.dosage',
            'name' => 'Dosage'
        ],
        [
            'id' => 'updated_at',
            'name' => 'Updated at'
        ]
    ];
    public function order()
    {
        return $this->morphOne(Order::class, 'subject');
    }
    public function requests()
    {
        return $this->belongsToMany(Request::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchaseorder()
    {
        return $this->belongsTo(Purchaseorder::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'subject');
    }
    public function pending()
    {
        return $this->morphMany(Pending::class, 'subject');
    }
}
