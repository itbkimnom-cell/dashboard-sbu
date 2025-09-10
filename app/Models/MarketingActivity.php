<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "marketing_activities".
 *
 * @property string $id
 * @property string $activity_type
 * @property Datetime $activity_date
 * @property string $notes
 * @property string $created_by
 * @property string $lead_id
 *
 * @property User $user
 *
 * @property Lead $lead
 *
 *
 */
class MarketingActivity extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'activity_type',
        'activity_date',
        'notes',
        'created_by',
        'lead_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'marketing_activities';

    protected $casts = [
        'activity_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
