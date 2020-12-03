<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class CardPrintController extends Controller
{
    /**
     * 
     * display cardPrint page
     * 
     * @param none
     */
    public function showCardPrint() {

        return view('cardPrint.index');
    }
}
