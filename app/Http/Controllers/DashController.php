<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DashboardRequest;
use App\Models\Dashboard;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashs = Dashboard::all();
        return view("home", compact('dashs'));
    }

    public function list()
    {
        $dashs = Dashboard::all();
        return view("dashboard.list", compact('dashs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DashboardRequest $request)
    {
        Dashboard::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'icon' => $request['icon'],
        ]);

        return redirect((route('home')))->with('success', 'The dashboard has been created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dash = Dashboard::findOrFail($id);
        return view("dashboard.view", compact('dash'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dash = Dashboard::findOrFail($id);
        return view('dashboard.edit', compact('dash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DashboardRequest $request, $id)
    {
        $dash = Dashboard::findOrFail($id);
        $dash->name = $request->input('name');
        $dash->url = $request->input('url');
        $dash->icon = $request->input('icon');
        $dash->save();

        return redirect(route('home'))->with('success', 'The dashboard has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dash = Dashboard::findOrFail($id);
        $dash->delete();

        return redirect('dashboard')->with('success', 'The dashboard has been deleted !');
    }
}
