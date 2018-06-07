<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Booking
 * @package App\Models
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $status
 * @property \Carbon\Carbon $date
 * @property double $price
 * @property string $comment
 * @property \App\Models\Quest $quest
 */
class Booking extends Model
{
    public const BOOKING_NEW = 'new';
    public const BOOKING_NOT_VERIFIED = 'not-verified';
    public const BOOKING_CONFIRMED = 'confirmed';
    public const BOOKING_CANCELED = 'canceled';
    public const BOOKING_CLOSED = 'closed';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'status',
        'date',
        'price',
        'comment',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
    ];

    /**
     * Booking quest.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quest(): BelongsTo
    {
        return $this->belongsTo(Quest::class);
    }
}
