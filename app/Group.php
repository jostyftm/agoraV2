<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
 	
 	protected $table = 'group';

 	protected $fillable = [
 		'name',
 		'quota',
 		'headquarter_id',
 		'grade_id',
 		'modality',
 		'type',
 		'working_day_id'
 	];	

    /**
     * Obtiene la relacion que hay entre el grupo y la matricula
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'group_id');
    }

 	/**
     * Obtiene la relacion que hay entre el grupo y la jornada
     */
    public function workingday()
    {
        return $this->belongsTo('App\Workingday', 'working_day_id');
    }

    /**
     * Obtiene la relacion que hay entre el grupo y la sede
     */
    public function headquarter()
    {
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    /**
     * Obtiene la relacion que hay entre el grupo y el grado
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

 	/**
 	 *
 	 *
 	 */
 	public static function getAllByInstitution($institution_id)
 	{
 		return Group::join('headquarter', 'group.headquarter_id', '=', 'headquarter.id')
 			->join('institution', 'headquarter.institution_id', '=', 'institution.id')
 			->select('group.*')
 			->where('institution.id', '=', $institution_id)
 			->orderBy('group.grade_id')
 			->get();
 	}
}
