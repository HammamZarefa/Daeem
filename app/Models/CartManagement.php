<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartManagement extends Model
{
    use HasFactory;

    protected $casts = [
        'bundle_course_ids' => 'array',
        'consultation_details' => 'object'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function bundle(): BelongsTo
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function consultationSlot(): BelongsTo
    {
        return $this->belongsTo(ConsultationSlot::class, 'consultation_slot_id');
    }

    public function coachingType(): BelongsTo
    {
        return $this->belongsTo(CoachingType::class, 'coaching_type_id');
    }
}
