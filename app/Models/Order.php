<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version February 16, 2020, 12:43 pm +0330
 *
 * @property \App\User user
 * @property string title
 * @property string verified
 * @property string desc
 * @property integer user_id
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'verified',
        'desc',
        'waite_status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'verified' => 'string',
        'waite_status' => 'string',
        'desc' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'verified' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function orderdetails()
    {
        return $this->hasMany('\App\Models\Orderdetail');
    }
}
