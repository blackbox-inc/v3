<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class formPreviewController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf();
    }

    public function index()
    {
        $type_user = $_GET['type'];
        $start_page = $_GET['start_page'];
        $end_page = $_GET['end_page'];
        $yr_created = $_GET['yr_created'];

        // $type_user = 'DHA0';
        // $start_page = 1;
        // $end_page = 5;
        // $yr_created = 23;
        $myarray = [];

        for ($i = $start_page; $i <= $end_page; $i++) {
            array_push($myarray, $i);
        }

        $this->fpdf->SetFont('Arial', 'B', 10);

        foreach ($myarray as $value) {
            $this->fpdf->AddPage();

            // LOGO
            $this->fpdf->Image('assets/logo.png', 5, 5, -900);
            // LINE
            $this->fpdf->Image('assets/vertical_line.png', 37, 7, -500);

            // TEXT COMPANY NAME
            $this->fpdf->SetFont('Arial', '', 12);
            $this->fpdf->SetXY(40, 16);
            $this->fpdf->Write(6, 'Ephesians Overseas Manpower Supply Inc.');

            // TEXT SLOGAN
            $this->fpdf->SetFont('Arial', '', 7);
            $this->fpdf->SetXY(40, 20);
            $this->fpdf->Write(
                6,
                'PREMIER LANDBASED MANPOWER RECRUITMENT AGENCY'
            );

            // DATE CREATED 1
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->SetXY(140, 32);
            $this->fpdf->Write(6, 'Date Created:_____________________');

            // DATE CREATED 2
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->SetXY(146, 233);
            $this->fpdf->Write(6, 'Date Created:_____________________');

            // SIGNATURE
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->SetXY(146, 225);
            $this->fpdf->Write(6, 'SIGNATURE:_____________________');

            // FOOTER
            $this->fpdf->Image('assets/footer.JPG', 1, 255, 208, 40);

            $code =
                'EOMS' .
                $yr_created .
                $type_user .
                str_pad($value, 5, '0', STR_PAD_LEFT);
            // $code = 'EOMS23DHB00051';

            $this->fpdf->Image(
                "https://eomsinc.com/v2/resume_builder/dh_form/qr_generator.php?code=$code",
                170,
                2,
                30,
                30,
                'png'
            );

            $this->fpdf->Image(
                'https://eomsinc.com/bcodegen/barcode.php?codetype=code128&size=50&text=' .
                    $code .
                    '&print=true',
                147,
                239,
                50,
                15,
                'png'
            );

            // // BARCODE IMAGE
            // $pdf->Image('footer.JPG',1,255,208,40);

            // The text barcode
            // $this->fpdf->SetXY(160, 248);
            // $this->fpdf->SetFont('Arial', '', 8);
            // $this->fpdf->Write(6, $code);

            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(10, 40);
            $this->fpdf->Cell(115, 10, 'PERSONAL DETAILS', 1, 0, 'C');
            $this->fpdf->Cell(35, 10, 'POSITION APPLIED:', 1, 0, 'C');
            $this->fpdf->Cell(40, 10, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 50);
            $this->fpdf->Cell(35, 6, 'FULL NAME:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 0, 'C');
            $this->fpdf->Cell(35, 6, 'Preferred Country:', 1, 0, 'L');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 56);
            $this->fpdf->Cell(35, 6, 'NATIONALITY:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 0, 'C');
            $this->fpdf->Cell(35, 6, 'Monthly Salary:', 1, 0, 'l');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 62);
            $this->fpdf->Cell(35, 6, 'RELIGION:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 0, 'C');
            $this->fpdf->Cell(35, 6, '___First Timer:', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 68);
            $this->fpdf->Cell(35, 6, 'DATE OF BIRTH:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 0, 'C');
            $this->fpdf->Cell(35, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 74);
            $this->fpdf->Cell(35, 6, 'AGE:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 0, 'C');
            $this->fpdf->Cell(35, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 80);
            $this->fpdf->Cell(35, 6, 'PLACE OF BIRTH:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 86);
            $this->fpdf->Cell(35, 6, 'HOME ADDRESS:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 92);
            $this->fpdf->Cell(35, 6, 'MARITAL STATUS:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 98);
            $this->fpdf->Cell(35, 6, 'NO. OF CHILDREN:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->SetXY(10, 104);
            $this->fpdf->Cell(35, 6, 'EDUC. BACKGROUND:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 110);
            $this->fpdf->Cell(35, 6, 'CONTACT NUMBER:', 1, 0, 'R');
            $this->fpdf->Cell(80, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(10, 116);
            $this->fpdf->Cell(
                115,
                6,
                'PREVIOUS EMPLOYMENT (ABROAD)',
                1,
                1,
                'C'
            );

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 122);
            $this->fpdf->Cell(25, 6, 'Country:', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 128);
            $this->fpdf->Cell(25, 6, 'Position:', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 134);
            $this->fpdf->Cell(25, 6, 'Period:', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'R');
            $this->fpdf->Cell(30, 6, '', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(10, 140);
            $this->fpdf->Cell(
                115,
                6,
                'HOUSEHOLD WORK EXPERIENCE(S)',
                1,
                1,
                'C'
            );

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 146);
            $this->fpdf->Cell(39, 6, '.    .Washing', 1, 0, 'L');
            $this->fpdf->Cell(38, 6, '.    .Cleaning', 1, 0, 'L');
            $this->fpdf->Cell(38, 6, '.    .Ironing', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 152);
            $this->fpdf->Cell(39, 6, '.    .Sewing', 1, 0, 'L');
            $this->fpdf->Cell(38, 6, '.    .Cooking', 1, 0, 'L');
            $this->fpdf->Cell(38, 6, '.    .Baby care', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(10, 158);
            $this->fpdf->Cell(115, 6, 'CONTACT PERSON:', 1, 1, 'C');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 164);
            $this->fpdf->Cell(115, 6, 'Name:', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 170);
            $this->fpdf->Cell(115, 6, 'Contact Number:', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 176);
            $this->fpdf->Cell(115, 6, 'Relationship:', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 182);
            $this->fpdf->Cell(115, 6, 'Address:', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(10, 188);
            $this->fpdf->Cell(
                115,
                6,
                'LANGUAGE YOU CAN SPEAK OR WRITE:',
                1,
                1,
                'C'
            );

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 194);
            $this->fpdf->Cell(30, 6, 'Language', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Fluent', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Fair', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Poor', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Weight:', 1, 0, 'R');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 200);
            $this->fpdf->Cell(30, 6, 'English', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Height:', 1, 0, 'R');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 206);
            $this->fpdf->Cell(30, 6, 'Arabic', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Passport No:', 1, 0, 'R');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 212);
            $this->fpdf->Cell(30, 6, 'Mandarin', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, '', 1, 0, 'L');
            $this->fpdf->Cell(30, 6, 'Blood type:', 1, 0, 'R');
            $this->fpdf->Cell(40, 6, '', 1, 1, 'L');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(10, 218);
            $this->fpdf->Cell(190, 35, '', 1, 1, '');

            $this->fpdf->SetXY(10, 220);
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->Write(6, 'REMARKS');

            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(160, 62);
            $this->fpdf->Cell(40, 18, '', 1, 0, '');

            $this->fpdf->SetXY(160, 62);
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->Write(6, '___Ex-Abroad');

            //  PHOTO 3R
            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->SetXY(125, 80);
            $this->fpdf->Cell(75, 114, '', 1, 0, '');

            $this->fpdf->SetXY(160, 66);
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->Write(6, 'Previous Agency Name:');

            $this->fpdf->SetXY(160, 70);
            $this->fpdf->SetFont('Arial', '', 8);
            $this->fpdf->Write(6, '_______________________');

            // CHECKBOX FIRST TIMER
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(127, 63.5);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            // CHECKBOX EX-ABROAD
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(162, 63.5);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX WASHING
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(12, 148);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX CLEANING
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(51, 148);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX IRONING
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(89, 148);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX SEWING
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(12, 153);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX COOKING
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(51, 153);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');

            //CHECKBOX BABYCARE
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetXY(89, 153);
            $this->fpdf->Cell(3, 3, '', 1, 1, 'L');
        }

        $this->fpdf->Output();

        exit();
    }
}

// {{ asset('plugins/jqvmap/jqvmap.min.css') }}
