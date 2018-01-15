<?php

namespace App\Helpers;

/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 12/01/2018
 * Time: 8:57 PM
 */

use App\Headquarter;
use App\Institution;
use App\Student;
use Codedge\Fpdf\Fpdf\Fpdf;
use setasign\Fpdi\Fpdi;


class GenerateEnrollmentCard extends Fpdi
{
    public function myHeader()
    {
        $this->setSourceFile('template/card.pdf');
        $pageId = $this->importPage(1);
        $this->useTemplate($pageId, null, null, null, null, true);

        $this->SetLineWidth(.1);
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0, 0, 0);

        parent::Header();
        $width_page = $this->GetPageWidth() - 20;
        $this->Cell(180, 10, strtoupper(utf8_decode('IE')), 0, 1, 'C');
        $this->ln(15);
        $this->SetFont('Arial', '', 6);
        $this->setY(35);
    }

    public function generateEnrollmentCard($enrollment_card, $institution_id)
    {
        $institution = Institution::findOrfail($institution_id);

        foreach ($enrollment_card as $enrollment) {
            date_default_timezone_set('UTC');
            $this->AddPage('P', 'Letter');
            $this->myHeader();

            $headquarter =  Headquarter::findOrfail($enrollment->headquarter_id);

            $lineas = 0;

            # Sesion formato de matricula de estudiante
            $this->Cell(119.5, 8, '', $lineas, 0, 'C');
            if (1 == 0) {
                //Nuevo
                $this->Cell(39.5, 8, "?..", $lineas, 0, 'C');
                $this->Cell(39.5, 8, "", $lineas, 1, 'C');
            } else {
                //Continuidad
                $this->Cell(39.5, 8, "", $lineas, 0, 'C');
                $this->Cell(40, 8, '?..', $lineas, 1, 'C');
            }
            $this->ln(4);

            # Fecha Matricula
            $this->Cell(99.5, 4, "", $lineas, 0, 'C');
            $this->Cell(20, 4, '?..', $lineas, 0, 'C');
            $this->Cell(19.5, 4, "", $lineas, 0, 'C');
            $this->Cell(20, 4, "", $lineas, 0, 'C');
            $this->Cell(19.5, 4, "", $lineas, 0, 'C');
            $this->Cell(20, 4, '?..', $lineas, 0, 'C');
            $this->ln(12);


            #Datos de la institución
            $this->Cell(79.5,4,strtoupper(utf8_decode($institution->name)),$lineas,0,'C');
            $this->Cell(59.5,4,strtoupper(utf8_decode($headquarter->name)),$lineas,0,'C');
            $this->Cell(59.5,4,strtoupper(utf8_decode($headquarter->address->city->name)),$lineas,0,'C');
            $this->ln(4);
            $this->Cell(19,4,"",$lineas,0,'C');
            $this->Cell(40.7,4,strtoupper(utf8_decode('?..')),$lineas,0,'');
            $this->Cell(19,4,"",$lineas,0,'C');
            $this->Cell(60.5,4,strtoupper(utf8_decode('??.')),$lineas,0,'');
            $this->Cell(19,4,"",$lineas,0,'C');
            $this->Cell(40.7,4,"",$lineas,0,'C');
            $this->ln(16);

            /*
             Datos de identificación del estudiante
            */
            $student = Student::findOrfail($enrollment->student_id);
            $identification = $student->identification;
            $gender = $student->identification->gender;
            $city_birth = $student->identification->city_birth;
            $city_expedition = $student->identification->city_expedition;
            $identification_type = $student->identification->identification_type;
            $province_ebirth = $student->identification->city_birth->province;
            $province_expedition = $student->identification->city_expedition->province;

            #Datos de identificación
            $identification_type_id = $student->identification->identification_type->id;
            $this->Cell(4.7,3.6,"",$lineas,0,'C'); $this->Cell(4.9,3.6,($identification_type_id==1?"X":""),$lineas,0,'C');
            $this->Cell(5,3.6,"",$lineas,0,'C'); $this->Cell(5,3.6,($identification_type_id==3?"X":""),$lineas,0,'C');
            $this->Cell(5,3.6,"",$lineas,0,'C'); $this->Cell(5,3.6,($identification_type_id==2?"X":""),$lineas,0,'C');
            $this->Cell(5,3.6,"",$lineas,0,'C'); $this->Cell(5,3.6,($identification_type_id==0?"X":""),$lineas,0,'C');

            $this->Cell(39.7,3.6,$student->identification->identification_number,$lineas,0,'C');
            $this->Cell(19.8,3.6,'?..',$lineas,0,'C');
            $this->Cell(29.8,3.6,strtoupper(utf8_decode($province_expedition->name)),$lineas,0,'C');
            $this->Cell(29.8,3.6,strtoupper(utf8_decode($city_expedition->name)),$lineas,0,'C');

            #Marcar con x Masculino o Femenino
            $gender_id = $gender->id;
            $this->Cell(14.9,3.6,"",$lineas,0,'C'); $this->Cell(5,3.6,($gender_id==1?"X":""),$lineas,0,'C');
            $this->Cell(14.9,3.6,"",$lineas,0,'C'); $this->Cell(5,3.6,($gender_id==2?"X":""),$lineas,0,'C');


        }
    }


}