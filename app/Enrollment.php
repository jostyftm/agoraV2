<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollment';

    protected $fillable =[
    	'student_id',
    	'group_id',
    	'enrollment_state_id',
    	'enrollment_result_id',
        'headquarter_id',
    ];


    /**
     * Obtiene la relacion que hay entre el grupo y la matricula
     */
    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }

    /**
     * Obtiene la relacion que hay entre el estudiante y la matricula
     */
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    /**
     * Obtiene la relacion que hay entre la matricula y la sede
     */
    public function headquarter()
    {
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    /**
     *
     *
     */
    public static function getByState($state, $institution_id)
    {
    	return 	Enrollment::join('headquarter', 'enrollment.headquarter_id', '=', 'headquarter.id')
    				      ->join('institution', 'headquarter.institution_id', '=', 'institution.id')
    				      ->select('enrollment.*')
    				      ->where('institution.id','=',$institution_id)
    				      ->get();
    }
}
