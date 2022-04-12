<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRole extends Model
{
    /**
     * Name of database table
     *
     * @var string
     */
    protected $table = 'user_role';

    /**
     * If true, will set created_at, and updated_at
     * values during insert and update routines.
     *
     * @var bool
     */
    protected $useTimestamps = true;

    /**
     * An array of field names that are allowed
     * to be set by the user in inserts/updates.
     *
     * @var array
     */
    protected $allowedFields = [
        'user_id',
        'role_id',
    ];
}
