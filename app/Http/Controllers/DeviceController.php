<?php namespace App\Http\Controllers;

use App\Device;

class DeviceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$devices = Device::with('values')->get();
        $devices = auth()->user()->devices()
            //->with('values')
            //->with(array('values' => function($q) { $q->orderby("id","desc")->take(10);}))
        ->get(); //get All Devices with Values from Loggedin User
        //return response()->json($devices,200);
        return view('devices')->with(['devices' => $devices,'title'=>"All Devices"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //TODO: FORM!
    }


    /**
     *
     */
    public function store()
    {
        //TODO: Store transaction
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $device = auth()
            ->user()
            ->devices()
            //->with('values')
            ->with(array('values' => function($q) { $q->orderby("id","desc")->take(24);}))
            ->with(array('valuesAcc' => function($q) { $q->orderby("id","desc")->take(20);}))
            ->find($id); //get Device with Values from Loggedin User
        if ($device) {

            return view('device')->with(['device' => $device,'title'=>"Detail View"]);
        }
        return response()->json("not found", 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $device = auth()
            ->user()
            ->devices()
            ->with('values')
            ->find($id); //get Device with id with Values from Loggedin User
        if ($device) {
            return response()->json($device, 200); //TODO: return form!
        }
        return response()->json("not found", 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $device = auth()->user()->devices()->with('values')->find($id); //get Device with Values from Loggedin User
        if ($device) {
            //return response()->json($device, 200); //TODO: do sth with device!
            return redirect('/device/'.$id);
        }
        return response()->json("not found", 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $device = auth()->user()->devices()->with('values')->find($id); //get Device with Values from Loggedin User
        if ($device) {
            $device->delete(); //TODO: Transaction
            //return response()->json($device, 200);
            return redirect('/device');
        }
        return response()->json("not found", 404);
    }

}

?>