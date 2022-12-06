<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public static $filterable = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	public function scopeFilters($q, array $data = array())
	{
		if (!empty($data['dataFilter'])) {
			$fields = json_decode($data['dataFilter'], true);
			$fields = array_filter($fields, 'strlen');
			$fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'like', "%$fields[$field]%");
							});
						} else {
							$query->where($field, 'like', "%$fields[$field]%");
						}
					}
				}
			});
		}
		$this->filterEqual($q, $data);
	}
	public function filterEqual($q, array $data = array())
	{
		if (!empty($data['dataEqualFilter'])) {
			$fields = json_decode($data['dataEqualFilter'], true);
			$fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->whereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], $fields[$field]);
							});
						} else {
							$query->where($field, $fields[$field]);
						}
					}
				}
			});
		}
	}
	/**
	 * Search function of fields in the database.
	 *
	 * @param array fields for searches
	 *
	 * @return results data
	 */
	// llamada por wh? dejame quitarle el telefono a mi madre

	public static function scopeSearch($q, array $data = array())
	{
		if (!empty($data['dataSearch'])) {
			$fields = json_decode($data['dataSearch'], true);
			$fields = array_filter($fields, 'strlen');
			$fields = Arr::except($fields, static::$filterable);
			$q->where(function ($query) use ($fields) {
				foreach ($fields as $field => $value) {
					if (isset($fields[$field])) {
						$contains = Str::of($field)->contains('.');
						$relations = Str::of($field)->explode('.');
						if ($contains) {
							$query->orWhereHas(Str::camel($relations[0]), function ($q) use ($relations, $fields, $field) {
								$q->where($relations[1], 'LIKE', "%$fields[$field]%");
							});
						} else {
							$query->orWhere($field, 'LIKE', "%$fields[$field]%");
						}
					}
				}
			});
		}

		if (isset($data['sortBy']) && isset($data['sortOrder'])) {
			$q->orderBy($data['sortBy'], $data['sortOrder']);
		}

		if (isset($data['paginate']) && $data['paginate'] === "true" || isset($data['paginated']) && $data['paginated'] === "true") {
			return $q->paginate($data['perPage']);
		} else {
			return $q->get();
		}
	}
    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)
            ->orWhere('email', $username)
            ->with('role.modules')
            ->first();
    }

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
