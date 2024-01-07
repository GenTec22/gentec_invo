<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $expenses = Expense::all();
        $expenseItems = ExpenseItem::all();

        return view('expense.index', compact('expenses','expenseItems'));
    }


    public function create()
    {
        $expensesitems = ExpenseItem::all();
        return view('expense.create',compact('expensesitems'));
    }


    public function store(Request $request)
    {

         $request->validate([

            'name' => 'required',
            'qty' => 'required',
            'amount' => 'required',
        ]);


        $incomes = new Expense();
        $incomes->name = $request->name;
        $incomes->particular = $request->particular;
        $incomes->qty = $request->qty;
        $incomes->amount = $request->amount;
        $incomes->save();


        return redirect()->back()->with('message', 'New Expense has been added successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $exitemes = ExpenseItem::all();
        $expnseedit =Expense::findOrFail($id);
        return view('expense.edit', compact('exitemes','expnseedit'));
    }




public function update(Request $request, $id)
{
    $request->validate([

                'particular' => 'required',
                'qty' => 'required',
                'amount' => 'required',
            ]);

    $iexupdates = Expense::find($id);

    if (!$iexupdates) {
        return redirect()->back()->with('error', 'Income not found');
    }

    $iexupdates->name = $request->name;
    $iexupdates->particular = $request->particular;
    $iexupdates->qty = $request->qty;
    $iexupdates->amount = $request->amount;
    $iexupdates->save();


    return redirect()->back()->with('message', ' Income has been Update successfully');
}

public function destroy($id)
    {
        $exdel = Expense::find($id);
        $exdel->delete();
        return redirect()->back();

    }


    public function getitem(){

        return view('expense.getitem');
    }


    public function storeitem(Request $request){

        $request->validate([
            'name'    => 'required',


        ]);
                $expenseitem = new ExpenseItem();
                $expenseitem->name = $request->name;
                $expenseitem->save();
                return redirect()->back()->with('message', 'New Expenseitem  successfully');
    }
}
