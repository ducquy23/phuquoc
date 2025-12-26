<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'option_name',
        'option_value',
        'description',
        'admin_created_id',
        'admin_updated_id',
    ];

    /**
     * @param string $name
     * @param mixed|null $default
     * @return mixed
     */
    public static function get(string $name, mixed $default = null): mixed
    {
        $record = static::query()->where('option_name', $name)->first();

        if (! $record) {
            return $default;
        }

        return $record->option_value ?? $default;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param string|null $description
     * @return static
     */
    public static function set(string $name, mixed $value, ?string $description = null): static
    {
        $record = static::query()->firstOrNew(['option_name' => $name]);

        $record->option_value = $value;

        if ($description !== null) {
            $record->description = $description;
        }

        $record->save();

        return $record;
    }
}




