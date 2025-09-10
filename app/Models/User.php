<?php

namespace App\Models;

use Datetime;
use Snippet\Helpers\JsonField;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property Datetime $email_verified_at
 * @property string $password
 * @property string $remember_token
 *
 * @property Company[] $companies
 *
 * @property Potential[] $potentials
 *
 * @property MarketingActivity[] $marketingActivities
 *
 * @property ToolLoan[] $toolLoans
 *
 * @property ToolInventory[] $toolInventories
 *
 * @property InspectorReport[] $inspektorReports
 *
 * @property ToolLoan[] $approvedReturnedBy
 *
 * @property ToolLoan[] $approvedBorrowedBy
 *
 * @property InspectorReport[] $administrationUser
 *
 *
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use HasTeams;
    use HasFactory;
    use Notifiable;
    use Searchable;
    use HasPermissions;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    protected $fillable = ['name', 'email', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's "personal" team.
     *
     * @return \App\Models\Team
     */
    public function personalTeam()
    {
        $personalTeam = $this->ownedTeams
            ->where('personal_team', true)
            ->first();

        if (empty($personalTeam)) {
            $personalTeam = $this->ownedTeams()->save(
                Team::forceCreate([
                    'user_id' => $this->id,
                    'name' => explode(' ', $this->name, 2)[0] . "'s Team",
                    'personal_team' => true,
                ])
            );
        }

        return $personalTeam;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'created_by');
    }

    public function potentials()
    {
        return $this->hasMany(Potential::class, 'created_by');
    }

    public function marketingActivities()
    {
        return $this->hasMany(MarketingActivity::class, 'created_by');
    }

    public function toolLoans()
    {
        return $this->hasMany(ToolLoan::class, 'borrowed_by');
    }

    public function toolInventories()
    {
        return $this->hasMany(ToolInventory::class, 'created_by');
    }

    public function inspektorReports()
    {
        return $this->hasMany(InspectorReport::class, 'inspector_user_id');
    }

    public function approvedReturnedBy()
    {
        return $this->hasMany(ToolLoan::class, 'approved_returned_by');
    }

    public function approvedBorrowedBy()
    {
        return $this->hasMany(ToolLoan::class, 'approved_borrowed_by');
    }

    public function administrationUser()
    {
        return $this->hasMany(InspectorReport::class, 'administration_user_id');
    }
}
