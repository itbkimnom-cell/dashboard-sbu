<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is the model class for table "tool_categories".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 *
 * @property ToolInventory[] $toolInventories
 *
 *
 */
class ToolCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'tool_categories';

    public function toolInventories()
    {
        return $this->hasMany(ToolInventory::class);
    }
}
