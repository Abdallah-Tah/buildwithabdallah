<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function __invoke(string $caseStudy): View
    {
        $study = config("case-studies.{$caseStudy}");

        abort_unless(is_array($study), 404);

        return view('pages.case-study', compact('study', 'caseStudy'));
    }
}
