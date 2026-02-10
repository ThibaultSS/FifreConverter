<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function assemble(Request $request) {
        $arrayLetters = $this->makeArray(strtoupper($request->letters));
        $arrayConvertedHorizontal = $this->convertArray($arrayLetters);
        return $this->printVertical($arrayConvertedHorizontal);
    }
    private function makeArray($letters) {
        $array = [];
        for ($i = 0; $i < strlen($letters); $i++) {
            array_push($array, $letters[$i]);
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
        $convertedArray = [];
        foreach ($array as $letter) {
            array_push($convertedArray, $this->convertLetter($letter));
        }
        return $convertedArray;
    }
    private function printVertical($array){
        $verticalArray = [];
        for ($i = 0; $i < 6; $i++) {
            $line = '';
            foreach ($array as $letter) {
                $line = $line . $letter[$i] . ' ';
            }
            array_push($verticalArray, $line);

        }
        return $verticalArray;
    }
}
