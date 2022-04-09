<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    /**
     * Name of database table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * If this model should use "softDeletes" and
     * simply set a date when rows are deleted, or
     * do hard deletes.
     *
     * @var bool
     */
    protected $useSoftDeletes = true;

    /**
     * If true, will set created_at, and updated_at
     * values during insert and update routines.
     *
     * @var bool
     */
    protected $useTimestamps = false;

    /**
     * An array of field names that are allowed
     * to be set by the user in inserts/updates.
     *
     * @var array
     */
    protected $allowedFields = [
        'name',
        'email',
        'password',
    ];
}
