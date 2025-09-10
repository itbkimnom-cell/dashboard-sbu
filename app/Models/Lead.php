<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "leads".
 *
 * @property string $id
 * @property string $stage
 * @property string $probability
 * @property Datetime $expected_close_date
 * @property float $lead_value
 * @property string $competitor
 * @property string $status
 * @property string $lost_reason
 * @property string $notes
 * @property Datetime $closed_at
 * @property string $potential_id
 *
 * @property Potential $potential
 *
 * @property MarketingActivity[] $marketingActivities
 *
 *
 */
class Lead extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'stage',
        'probability',
        'expected_close_date',
        'lead_value',
        'competitor',
        'status',
        'lost_reason',
        'notes',
        'closed_at',
        'potential_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'expected_close_date' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function potential()
    {
        return $this->belongsTo(Potential::class);
    }

    public function marketingActivities()
    {
        return $this->hasMany(MarketingActivity::class);
    }
}
