<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Users Model
 */
class UsersModel extends Model
{
    // The table must be protected
    protected $table = "user";

    // Columns that are insertables and must be protected
    protected $fillable = array('id','fullname','username','password','is_active');

    // Table should have updated_at and created_at columns when this is set to true
    public $timestamps = false;

}
?>
