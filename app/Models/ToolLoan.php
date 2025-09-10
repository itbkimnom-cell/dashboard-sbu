<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "tool_loans".
 *
 * @property string $id
 * @property Datetime $start_loan_date
 * @property Datetime $end_loan_date
 * @property Datetime $return_date
 * @property string $quantity
 * @property string $condition_out
 * @property string $condition_in
 * @property string $status
 * @property string $notes
 * @property string $tool_inventory_id
 * @property string $borrowed_by
 * @property string $approved_borrowed_by
 * @property string $approved_returned_by
 *
 * @property ToolInventory $toolInventory
 *
 * @property User $borrowedBy
 *
 * @property User $approvedReturnedBy
 *
 * @property User $approvedBorrowedBy
 *
 *
 */
class ToolLoan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'start_loan_date',
        'end_loan_date',
        'return_date',
        'quantity',
        'condition_out',
        'condition_in',
        'status',
        'notes',
        'tool_inventory_id',
        'borrowed_by',
        'approved_borrowed_by',
        'approved_returned_by',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tool_loans';

    protected $casts = [
        'start_loan_date' => 'datetime',
        'end_loan_date' => 'datetime',
        'return_date' => 'datetime',
    ];

    public function toolInventory()
    {
        return $this->belongsTo(ToolInventory::class);
    }

    public function borrowedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }

    public function approvedReturnedBy()
    {
        return $this->belongsTo(User::class, 'approved_returned_by');
    }

    public function approvedBorrowedBy()
    {
        return $this->belongsTo(User::class, 'approved_borrowed_by');
    }
}
