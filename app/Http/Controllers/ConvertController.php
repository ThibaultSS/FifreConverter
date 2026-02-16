<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function downloadPdf(Request $request) {
        $verticalArray = $this->assemble($request);

        $pdf = Pdf::loadView('pdf.grid', [
            'verticalArray' => $verticalArray,
            'cellSize' => 30,
            'cellSpacing' => 2,
            'colorZero' => '#ffffff',
            'colorX' => '#000000',
        ]);

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('fifre-grid.pdf');
    }

    public function assemble(Request $request) {
        $arrayLetters = $this->makeArray($request->input('letters'));
        $arrayConvertedHorizontal = $this->convertArray($arrayLetters);
        return $this->printVertical($arrayConvertedHorizontal);
    }
    private function makeArray($letters) {
        $array = array();
        for ($i = 0; $i < count($letters); $i++) {
            $array[$i] = str_split($letters[$i]);
        }
        return $array;
    }
    private function convertLetter($letter) {
        $fifre = [
            'A' => '00000X',
            'B' => 'X00000',
            'C' => 'XXXX00',
            'D' => '0XX0XX',
            'E' => 'XXX000',
            'F' => 'X0XX0X',
            'G' => '0XXXXX',
            ' ' => '      '
        ];
        return $fifre[$letter];
    }
    private function convertArray($array) {
        $convertedArray = array();
        for ($i = 0; $i < count($array); $i++) {
            $convertedLine = '';
            for ($j = 0; $j < count($array[$i]); $j++) {
                $convertedLine = $convertedLine . $this->convertLetter(strtoupper($array[$i][$j]));
            }
            array_push($convertedArray, $convertedLine);
        }
        return $convertedArray;
        
    }
    private function printVertical($array){
        $verticalArray = array();
        for ($k = 0; $k < count($array); $k++) {
            for($i = 0; $i < 6; $i++){
                $line = '';
                for($j = 0; $j < (strlen($array[$k])/6); $j++){
                    $line = $line . $array[$k][($j*6)+$i] . ' ';
                }
                array_push($verticalArray, $line);
            }
        }

        return $verticalArray;
    }
}
