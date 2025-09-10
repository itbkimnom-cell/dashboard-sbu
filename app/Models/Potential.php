<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "potentials".
 *
 * @property string $id
 * @property string $job_type
 * @property string $project_name
 * @property string $source
 * @property string $interest_level
 * @property float $estimated_value
 * @property string $status
 * @property string $notes
 * @property string $company_id
 * @property string $created_by
 *
 * @property Company $company
 *
 * @property User $user
 *
 * @property Lead[] $leads
 *
 *
 */
class Potential extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'job_type',
        'project_name',
        'source',
        'interest_level',
        'estimated_value',
        'status',
        'notes',
        'company_id',
        'created_by',
    ];

    protected $searchableFields = ['*'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
