<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "inspector_reports".
 *
 * @property string $id
 * @property string $name
 * @property Datetime $inspection_date
 * @property string $file_report
 * @property Datetime $file_report_date
 * @property string $file_bast
 * @property Datetime $file_bast_date
 * @property string $inspector_user_id
 * @property string $administration_user_id
 *
 * @property User $inspectorUser
 *
 * @property User $administrationUser
 *
 *
 */
class InspectorReport extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'inspection_date',
        'file_report',
        'file_report_date',
        'file_bast',
        'file_bast_date',
        'inspector_user_id',
        'administration_user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'inspector_reports';

    protected $casts = [
        'inspection_date' => 'datetime',
        'file_report_date' => 'datetime',
        'file_bast_date' => 'datetime',
    ];

    public function inspectorUser()
    {
        return $this->belongsTo(User::class, 'inspector_user_id');
    }

    public function administrationUser()
    {
        return $this->belongsTo(User::class, 'administration_user_id');
    }
}
