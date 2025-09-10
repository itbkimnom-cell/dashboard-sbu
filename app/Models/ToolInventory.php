<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "tool_inventories".
 *
 * @property string $id
 * @property string $name
 * @property Datetime $purchase_date
 * @property float $purchase_price
 * @property string $location_store
 * @property string $quantity
 * @property string $status
 * @property string $picture
 * @property string $notes
 * @property string $tool_category_id
 * @property string $created_by
 *
 * @property ToolCategory $toolCategory
 *
 * @property ToolLoan[] $toolLoans
 *
 * @property User $createdBy
 *
 *
 */
class ToolInventory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'purchase_date',
        'purchase_price',
        'location_store',
        'quantity',
        'status',
        'picture',
        'notes',
        'tool_category_id',
        'created_by',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tool_inventories';

    protected $casts = [
        'purchase_date' => 'datetime',
    ];

    public function toolCategory()
    {
        return $this->belongsTo(ToolCategory::class);
    }

    public function toolLoans()
    {
        return $this->hasMany(ToolLoan::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
