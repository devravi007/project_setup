<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Smalot\PdfParser\Parser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function read()
    {
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile(public_path('demo-pdf.pdf'));
        $content = $pdf->getText();
        $details = $pdf->getDetails();



        // extract text of a limited amount of pages. here, it will only use the first two pages. 
        $text = $pdf->getText(2);

        // extract the text of a specific page (in this case the first page) 
        // $text = $pdf->getPages()[0]->getText();

        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            // Split each line by ":"
            $parts = explode(":", $line, 2); // Limit to 2 parts in case address has ":"
       
            // Trim whitespace from parts
            $key = trim($parts[0]);
            $value[$key] = trim($parts[1] ?? '');
            
            // // Assign values based on key
            // switch ($key) {
            //     case 'FirstName':
            //         $firstName = $value;
            //         break;
            //     case 'LastName':
            //         $lastName = $value;
            //         break;
            //     case 'Dob':
            //         $dob = $value;
            //         break;
            //     case 'Address':
            //         $address = $value;
            //         break;
            //     default:
            //         // Handle unexpected keys or ignore
            //         break;
            // }
        }
        print_r($value);
        // Output the extracted values (optional)
        // echo "First Name: $firstName<br>";
        // echo "Last Name: $lastName<br>";
        // echo "DOB: $dob<br>";
        // echo "Address: $address<br>";
        die;
        // Pass $content to a view for displaying as HTML
        return view('display')->with('content', $content);
    }
}
