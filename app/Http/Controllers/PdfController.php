<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Group;
use PDF;

class PdfController extends Controller
{
    public function inscription($group_id, $year)
    {
    	$students = Student::getGroup($group_id);
    	$group = Group::findOrFail($group_id);

    	// dd($group->headquarter->institution);
    	$pdf = PDF::loadView('pdf.inscription', compact('students', 'group'));
    	return $pdf->stream('Grupo.pdf');
    }
}
