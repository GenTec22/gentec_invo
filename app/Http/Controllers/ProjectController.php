<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projectlist = Project::paginate(15);
        return view('project.index',compact('projectlist'));
    }


    public function create()
    {
        // Your function logic goes here
        return view('project.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'address'        => 'required|not_in:0',


        ]);


                $project = new Project();
                $project->name   = $request->name;
                $project->mobile    = $request->mobile;
                $project->email    = $request->email;
                $project->address       = $request->address;
                $project->unit= $request->unit;
                $project->floor         = $request->floor;
                $project->s_charge  = $request->s_charge;
                $project->agreement_date     = $request->agreement_date;
                $project->details        = $request->details;
                $project->status      = $request->status;
                $project->save();




                return redirect()->back()->with('message', 'Project added successfully');


    }


    public function show(string $id)
    {
        $projectshow = Project::findOrFail($id);
        return view('project.show', compact('projectshow'));
    }


    public function edit(string $id)
    {
        $projectedit = Project::findOrFail($id);

        return view('project.edit', compact('projectedit'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string',
            'address'  => 'required|not_in:0',
        ]);

        $project = Project::find($id);

        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }

                $project->name     = $request->name;
                $project->mobile   = $request->mobile;
                $project->email    = $request->email;
                $project->address  = $request->address;
                $project->unit     = $request->unit;
                $project->floor    = $request->floor;
                $project->s_charge = $request->s_charge;
                $project->agreement_date= $request->agreement_date;
                $project->details  = $request->details;
                $project->status   = $request->status;
                $project->save();


                return redirect()->back()->with('message', 'Project update successfully');
    }

    public function destroy(string $id)
    {
        // Find the existing resource by ID
        $projectdestroy = Project::findOrFail($id);

        // Delete the resource
        $projectdestroy->delete();

        // Redirect to the index page or any other appropriate page
        return redirect()->route('project.index')
            ->with('success', 'Resource deleted successfully');
    }


}
