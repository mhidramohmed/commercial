<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Servant;
use App\Models\Table;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Medium;

class PaymentController extends Controller
{
    public function index(){
        // $serveurs=Servant::all();
        // return $serveurs;
        return view('payments.index')
            ->with([
                'tables'=>Table::all(),
                'menus'=>Menu::all(),
                'serveurs'=>Servant::all(),
            ]);
    }
}
