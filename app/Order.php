<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helper\DataViewer;
class Order extends Model
{
    use DataViewer;
    protected $fillable = [
        'type',
        'user_id',
        'subject_type',
        'subject_id',
        'date_delivered',
        'po_number',
        'pr_number',
        'source_id',
        'quantity',
        'unit_id',
        'dispensing_unit',
        'data'
    ];
    protected $casts = [
        'subjectdata' => 'array',
    ];
    public static $columns = [

        [
            'id' => 'po_number',
            'name' => 'PO number'
        ],
        [
            'id' => 'user.name',
            'name' => 'Users'
        ],
        [
            'id' => 'updated_at',
            'name' => 'Updated at'
        ]
    ];

    public function subject()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

}

