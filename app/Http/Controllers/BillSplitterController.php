<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BillSplitterCreateRequest;

class BillSplitterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

       /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function calc_data(BillSplitterCreateRequest $request)
    {
        $splitterVal = 0;
        $input = $request->except("_token");
        $subTotal = $input['tab'] + ($input['service-tip'] * $input['tab'] / 100);
        $splitterVal = number_format($subTotal / $_REQUEST['split_way'], 2);
        if (isset($input['round-up']) and $input['round-up'] == 'yes') {
            $splitterVal = ceil($splitterVal);
        }

        $request->session()->flash('splitterVal', $splitterVal);

        return redirect('/')->withInput($input);
    }


}
