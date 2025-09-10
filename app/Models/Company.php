<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "companies".
 *
 * @property string $id
 * @property string $name
 * @property string $industry
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $pic_name
 * @property string $pic_position
 * @property string $pic_phone
 * @property string $created_by
 *
 * @property User $user
 *
 * @property Potential[] $potentials
 *
 *
 */
class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'industry',
        'address',
        'phone',
        'email',
        'website',
        'pic_name',
        'pic_position',
        'pic_phone',
        'created_by',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function potentials()
    {
        return $this->hasMany(Potential::class);
    }
}
