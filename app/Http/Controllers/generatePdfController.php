<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pdf\MyPdf;
use App\Models\c_educ;
use App\Models\c_category;
use App\Models\c_skill;
use App\Models\c_exp;
use App\Models\basic_info;
use App\Models\c_info;

class generatePdfController extends Controller
{
    public function generatePdf($id)
    {
        $barcode = $id;

        $pdf = new MyPdf();

        $pdf->SetPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(5, 5, 5);

        $pdf->AddPage();

        /*
        |--------------------------------------------------------------------------
        | NAVY BLUE BOX
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        */

        // Set the fill color to navy blue for the square
        $pdf->SetFillColor(0, 0, 128);
        // Draw the square
        $x = 5;
        $y = 5;
        $size = 70;
        $pdf->Rect($x, $y, $size, $size, 'F');

        /*
        |--------------------------------------------------------------------------
        | RECTANGLE GOLD
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        */

        // Set the line width and color
        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(0, 0, 0);

        // Set the position and size of the rectangle
        $pdf->SetFillColor(130, 116, 54);
        $x = 5; // X position
        $y = 75; // Y position
        $width = 70; // Width of the rectangle
        $height = 215; // Height of the rectangle

        // Draw the rectangle
        $pdf->Rect($x, $y, $width, $height, 'F');

        /*
        |--------------------------------------------------------------------------
        | 2x2 PHOTO
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        */

        $imagePath = public_path('assets/2x2.jpg');

        $x = 15;
        $y = 13;
        $width = 50;
        $height = 50;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | FULLNAME WORKER
        |--------------------------------------------------------------------------
        */

        $information = c_info::where('barcode', '=', $barcode)->get();
        //
        if (count($information)) {
            $pdf->SetXY(14, 62);
            $pdf->SetFont('helvetica', 'B', 11);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->Cell(0, 10, strtoupper($information[0]->fullname), 0, 1);
            $pdf->SetTextColor(0, 0, 0);
        }

        /*
        |--------------------------------------------------------------------------
        | ICON PERSONAL DATA
        |--------------------------------------------------------------------------
        |
        */

        $imagePath = public_path('assets/person-white.png');

        $x = 10;
        $y = 85;
        $width = 10;
        $height = 10;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | PERSONAL DATA TITLE
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(23, 85);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 10, 'PERSONAL DATA', 0, 1);
        $pdf->SetTextColor(0, 0, 0);

        /*
        |--------------------------------------------------------------------------
        | ICON BIRTHDATE
        |--------------------------------------------------------------------------
        |
        */

        $imagePath = public_path('assets/calendar-white.png');

        $x = 11;
        $y = 98;
        $width = 7;
        $height = 7;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | BIRTHDATE VALUE
        |--------------------------------------------------------------------------
        */
        $objectives = basic_info::where('barcode', '=', $barcode)->get();
        $pdf->SetXY(23, 97);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 10, $objectives[0]->dob, 0, 1);
        $pdf->SetTextColor(0, 0, 0);

        /*
        |--------------------------------------------------------------------------
        | ICON GENDER
        |--------------------------------------------------------------------------
        |
        */

        $imagePath = public_path('assets/gender-white.png');

        $x = 11;
        $y = 107;
        $width = 7;
        $height = 7;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | GENDER VALUE
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(23, 106);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 10, $objectives[0]->gender, 0, 1);
        $pdf->SetTextColor(0, 0, 0);

        /*
        |--------------------------------------------------------------------------
        | ICON HEIGHT
        |--------------------------------------------------------------------------
        |
        */

        $imagePath = public_path('assets/measure.png');

        $x = 11;
        $y = 116;
        $width = 7;
        $height = 7;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | HEIGHT VALUE
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(23, 116);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 10, $objectives[0]->height . ' cm', 0, 1);
        $pdf->SetTextColor(0, 0, 0);

        /*
        |--------------------------------------------------------------------------
        | ICON EDUCATION
        |--------------------------------------------------------------------------
        |
        */

        $imagePath = public_path('assets/education-white.png');

        $x = 10;
        $y = 135;
        $width = 10;
        $height = 10;

        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | EDUCATION  TITLE
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(23, 135);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 10, 'EDUCATION', 0, 1);
        $pdf->SetTextColor(0, 0, 0);

        // Set the position and size of the cell
        $x = 0;
        $y = 150;
        $width = 70;
        $height = 50;

        // Add HTML content to the cell

        $c_educ = c_educ::where('barcode', $barcode)->get();
        if (count($c_educ)) {
            foreach ($c_educ as $educ) {
                $html =
                    '<ul style="list-style-type: none; color:white;">
            <li><strong>SCHOOL:</strong> ' .
                    $educ->school .
                    '</li>
            <li><strong>COURSE: </strong>' .
                    $educ->degree .
                    '</li>
            <li><strong>S.Y: </strong>' .
                    $educ->school_year .
                    '</li>
            </ul>';
            }
        }

        $pdf->SetFont('helvetica', '', 9);
        $pdf->writeHTMLCell(
            $width,
            $height,
            $x,
            $y,
            $html,
            0,
            1,
            false,
            true,
            'J',
            true
        );

        /*
        |--------------------------------------------------------------------------
        | CAREER OBJECTIVES
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        */

        /*
        |--------------------------------------------------------------------------
        | IMAGE ICON
        |--------------------------------------------------------------------------
        */

        // Set the XY position where you want to insert the image
        $x = 85;
        $y = 15;

        // Set the width and height of the image
        $width = 10;
        $height = 10;

        // Set the image file path
        $imagePath = public_path('assets/person.png');

        // Insert the image into the PDF at the specified XY position
        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | CAREER PROFILE TITLE TEXT
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(97, 15);
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'CAREER PROFILE', 0, 1);

        /*
        |--------------------------------------------------------------------------
        | CAREER OBJECTIVE DETAILS 
        |--------------------------------------------------------------------------
        */

        // Define the position and dimensions of the rectangle
        $pdf->SetFont('helvetica', '', 9);
        $x = 95;
        $y = 23;
        $w = 100;
        $h = 0.5;

        // Draw the rectangle
        // $pdf->SetDrawColor(255, 255, 255);
        $pdf->Rect($x, $y, $w, $h, 'F');

        // Position the cursor inside the rectangle
        $pdf->SetXY($x + 5, $y + 5);

        // Define the HTML content

        $objectives = basic_info::where('barcode', '=', $barcode)->get();
        if (count($objectives)) {
            $html = $objectives[0]->objectives;
        }
        // Set the width of the HTML content
        $width = $w - 10;

        // Output the HTML content
        $pdf->writeHTMLCell(
            $width,
            $h - 10,
            '',
            '',
            $html,
            0,
            0,
            false,
            true,
            'J',
            true
        );

        /*
        |--------------------------------------------------------------------------
        | WORKER EXPERIENCE
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        */

        /*
        |--------------------------------------------------------------------------
        | IMAGE ICON
        |--------------------------------------------------------------------------
        */

        // Set the XY position where you want to insert the image
        $x = 85;
        $y = 55;

        // Set the width and height of the image
        $width = 10;
        $height = 10;

        // Set the image file path
        $imagePath = public_path('assets/person.png');

        // Insert the image into the PDF at the specified XY position
        $pdf->Image(
            $imagePath,
            $x,
            $y,
            $width,
            $height,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );

        /*
        |--------------------------------------------------------------------------
        | CAREER PROFILE TITLE TEXT
        |--------------------------------------------------------------------------
        */

        $pdf->SetXY(97, 55);
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'WORK EXPERIENCE', 0, 1);

        //
        //
        //
        //
        //
        //
        //
        //
        //
        //

        /*
            |--------------------------------------------------------------------------
            | CAREER OBJECTIVE DETAILS 
            |--------------------------------------------------------------------------
            */

        // Define the position and dimensions of the rectangle

        $x = 95;
        $y = 63;
        $w = 100;
        $h = 0.5;

        // Draw the rectangle
        // $pdf->SetDrawColor(255, 255, 255);
        $pdf->Rect($x, $y, $w, $h, 'F');

        // Position the cursor inside the rectangle
        $pdf->SetXY($x + 5, $y + 5);

        /*
            |--------------------------------------------------------------------------
            | JOB DESCRIPTION
            |--------------------------------------------------------------------------
            */

        // Define the position and dimensions of the rectangle
        $pdf->SetFont('helvetica', '', 9);

        $x = 85;
        $y = 66;
        $w = 110;
        $h = 0.5;

        // Draw the rectangle
        $pdf->SetDrawColor(255, 255, 255);
        $pdf->Rect($x, $y, $w, $h, '');
        $pdf->SetXY($x + 5, $y + 5);
        $pdf->SetFont('helvetica', '', 8);

        $html = '';

        $c_exp = c_exp::where('barcode', '=', $barcode)->get();
        if (count($c_exp)) {
            foreach ($c_exp as $exp) {
                $html .=
                    '<h2>' .
                    strtoupper($exp->cposition) .
                    '</h2>
                <ul style="list-style-type: square;">
                <li><strong>COMPANY: ' .
                    strtoupper($exp->ccompany) .
                    ' </strong></li>
                <li>INCLUSIVE DATE: ' .
                    strtoupper($exp->cdate) .
                    '</li>
                </ul>
                <h4>JOB DESCRIPTION:</h4>' .
                    $exp->sdesc .
                    '<hr>';
            }
        }

        $c_skill = c_skill::where('barcode', $barcode)->get();

        if (count($c_skill)) {
            $skills =
                '
            <h2>SKILLS</h2>
           ' . $c_skill[0]->sdesc;
        } else {
            $skills = '';
        }

        $seminar_and_training = '<p>&nbsp;</p>
        <h2>SEMINARS AND TRAINING</h2>
       123';

        $stringHeight = $pdf->getStringHeight(85, $html);
        $width = $w;
        $pdf->writeHTMLCell(
            $width,
            $h - 10,
            '',
            '',
            $html . $skills,
            0,
            0,
            false,
            true,
            'J',
            true
        );

        //
        //
        //

        for ($i = 1; $i < $pdf->getNumPages(); $i++) {
            $pdf->AddPage();

            $pdf->SetLineWidth(0.5);
            $pdf->SetDrawColor(0, 0, 0);
            $pdf->SetFillColor(130, 116, 54);
            $x = 5; // X position
            $y = 10; // Y position
            $width = 70; // Width of the rectangle
            $height = 275; // Height of the rectangle

            // Draw the rectangle
            $pdf->Rect($x, $y, $width, $height, 'F');
        }

        // GET THE LAST
        //
        // Get the total number of pages in the PDF document
        $pdf->SetXY(85, 250);
        $totalPages = $pdf->getNumPages();
        // Set the pointer to the last page
        $pdf->setPage($totalPages);
        // Set the font size and style for the title
        $pdf->SetFont('times', 'I', 8);
        // Add the title to the last page
        $pdf->Cell(
            0,
            10,
            'I hereby signify that the above information is true and correct to the best of my knowledge and belief',
            0,
            1,
            'L'
        );

        $pdf->SetXY(85, 260);
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(0, 10, strtoupper($information[0]->fullname), 0, 1, 'R');

        $pdf->SetXY(85, 265);
        $pdf->SetFont('times', '', 8);
        $pdf->Cell(0, 10, 'SIGNATURE OVER PRINTED', 0, 1, 'R');

        $pdf->Output('example.pdf');
    }
}