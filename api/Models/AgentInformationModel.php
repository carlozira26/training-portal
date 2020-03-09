<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Users Model
 */
class AgentInformationModel extends Model
{
    // The table must be protected
    protected $table = "agent_information";

    // Columns that are insertables and must be protected
    protected $fillable = array('id','firstname','middlename','lastname','birthday','contactnumber','address','municipality','gender','civilstatus','educationallevel','coursetaken','fdexperience','ccexperience','reference','batchnumber','account','site','trainer','ctstartdate','ctenddate','nhipstartdate','nhipenddate','pbdate','trainingstatus','reason','aht','qagrade','totaltc','avetc','complaintcount','complaintovertc','absencescount','tardinesscount','reliability','agentsite','ngucc','ironman','xavier','crm');

    // Table should have updated_at and created_at columns when this is set to true
    public $timestamps = false;

}
?>
