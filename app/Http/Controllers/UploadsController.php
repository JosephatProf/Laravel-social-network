<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
class UploadsController extends Controller
{
    public function imageUpload(Request $request)
	{
		if (Input::hasFile('file')) {
			echo 'uploaded <br />';
			$file = Input::file('file');
			$file->move(public_path('uploads'), $file->getClientOriginalName());

			echo '<img src="uploads/'. $file->getClientOriginalName() .'" />';
		}else{
			echo 'not uploaded';
		}
		
	}
}
