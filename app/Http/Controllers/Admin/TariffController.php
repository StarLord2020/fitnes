<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tariff\StoreRequest;
use App\Http\Requests\Tariff\UpdateRequest;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tariffs= Tariff::all()->toArray();

        return view('admin.tariff.index',compact('tariffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tariff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Tariff::create($request->all());
        return response('ok',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tariff $tariff)
    {
        return view('admin.tariff.edit',compact('tariff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Tariff $tariff)
    {
        $data = $request->only(['name','price']);

        $tariff->update($data);

        return ['response'=>'updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tariff $tariff)
    {
        $user_role = auth()->user()->role;
        if($user_role=='Адмін') {

            $tariff->delete();

            return ['response' => 'deleted'];
        }
    }
}
