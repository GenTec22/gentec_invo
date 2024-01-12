<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ServiceBill;
use Rmunate\Utilities\SpellNumber;
class ServiceBillController extends Controller
{

    public function index(){
        $servicebills = ServiceBill::paginate(15);
        return view('serviceBill.index',compact('servicebills'));

    }


   public function create(Request $request){

        $datas = Project::get();
        // $projects = Project::all();
        return view('servicebill.create', compact('datas'));

        dd($projects);


    }



   public function store(Request $request ){

    $request->validate([

        'date' => 'required',
        'project_id' => 'required',
        'bill_month' => 'required',

    ]);

    $servicebills = new ServiceBill();
    $servicebills->date = $request->date;
    $servicebills->ref = $request->ref;
    $servicebills->project_id = $request->project_id;
    $servicebills->bill_month = $request->bill_month;
    $servicebills->status = $request->status;
    $servicebills->save();
    return redirect()->back()->with('message', 'New Bill has been created successfully');
   }

   public function show($id)
    {

        $showservicebills = ServiceBill::findOrFail($id);
        $projects = Project::where('id', $id)->first();

        return view('servicebill.show', compact('showservicebills', 'projects'));

    }


}
