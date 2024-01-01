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
        return view('payments.index')
            ->with([
                'tables'=>Table::all(),
                'categories'=>Category::all(),
                'serveurs'=>Servant::all(),
                'menus'=>Menu::all()
            ]);
    }
}
