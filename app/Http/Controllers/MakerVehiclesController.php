<?php

namespace App\Http\Controllers;

use App\Maker;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MakerVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $maker = Maker::find($id);
        if(!$maker)
        {
            return response()->json(['message' => "This maker does not exist", 'code' => 404],404);
        }
        $vehicles = $maker->vehicles;

        return response()->json(['data' => $vehicles], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateVehicleRequest  $request
     * @param  int $makerId
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request, $makerId)
    {
        $maker = Maker::find($makerId);

        if(!$maker)
        {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }
        $values = $request->all();
        $maker->vehicles()->create($values);

        return response()->json(['message' => 'The vehicle associated was created'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int $vehicleId
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vehicleId)
    {
        $maker = Maker::find($id);
        if(!$maker)
        {
            return response()->json(['message' => "This maker does not exist", 'code' => 404],404);
        }
        $vehicle = $maker->vehicles->find($vehicleId);
        if(!$vehicle)
        {
            return response()->json(['message' => "This maker does not exist for this maker", "code" => 404], 404);
        }

        return response()->json(['data' => $vehicle], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CreateVehicleRequest  $request
     * @param  int  $makerId
     * @param  int  $vehicleId
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVehicleRequest $request, $makerId, $vehicleId)
    {
        $maker = Maker::find($makerId);
        if(!$maker)
        {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if(!$vehicle)
        {
            return response()->json(['message' => "This maker does not exist for this maker", "code" => 404], 404);
        }

        $color = $request->get('color');
        $power = $request->get('power');
        $capacity = $request->get('capacity');
        $speed = $request->get('speed');

        $vehicle->color = $color;
        $vehicle->power = $power;
        $vehicle->capacity = $capacity;
        $vehicle->speed = $speed;

        $vehicle->save();

        return response()->json(['message' => 'The vehicle has been updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
