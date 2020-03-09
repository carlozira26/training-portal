<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Users Model
 */
class LookupModel extends Model
{
    // The table must be protected
    protected $table = "lookup";

    // Columns that are insertables and must be protected
    protected $fillable = array('id','type','name','is_active');

    // Table should have updated_at and created_at columns when this is set to true
    public $timestamps = false;

}
?>
