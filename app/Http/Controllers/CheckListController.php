<?php

namespace App\Http\Controllers;

use App\Checklist;

class CheckListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        $checklists = Checklist::paginate(5);

        return response()->json($checklists);
    }

    //
}
