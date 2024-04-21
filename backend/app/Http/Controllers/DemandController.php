<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Demand;
use App\Mail\NewDemand;
use App\Mail\DemandState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Demand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->userId);
        $request->validate([
            'type' => 'required|in:Relevé des Notes,Attestation de poursuite de formation',
        ]);


        $demand = new Demand();
        $demand->type = $request->type;
        $demand->user_id = $request->userId;
        $demand->save();

        $admins = Admin::all();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewDemand($request->user_id, $request->type));
        }

        return response()->json(['message' => 'Demand created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demand = Demand::find($id);
        if (!$demand) return response()->json(['message' => 'Demand not found'], 404);
        return response()->json($demand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $demand = Demand::find($id);
        if (!$demand) return response()->json(['message' => 'Demand not found'], 404);

        $request->validate([
            'type' => 'required|in:Relevé des Notes,Attestation de poursuite de formation',
            'user_id' => 'required|exists:users,id',
        ]);

        $demand = new Demand();
        $demand->type = $request->type;
        $demand->user_id = $request->user_id;
        $demand->save();

        return response()->json(['message' => 'Demand updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demand = Demand::find($id);
        if (!$demand) return response()->json(['message' => 'Demand not found'], 404);
        $demand->delete();
        return response()->json(['message' => 'Demand deleted successfully']);
    }


    public function accept($id)
    {
        $request = request();

        $demand = Demand::find($id);
        if (!$demand) return response()->json(['message' => 'Demand not found'], 404);

        $request->validate([
            'when_to_deliver' => 'required|date',
        ]);

        $demand->is_accepted = true;
        $demand->when_to_deliver = Carbon::parse($request->when_to_deliver)->format('Y-m-d');
        $demand->accepted_at = Carbon::now('Africa/Casablanca')->format('Y-m-d H:i:s');
        $demand->save();

        $user = User::find($demand->user_id);

        Mail::to($user->email)->send(new DemandState($demand, 'accepted'));

        return response()->json(['message' => 'Demand accepted successfully']);
    }
    public function not_accept($id)
    {
        $demand = Demand::find($id);
        if (!$demand) return response()->json(['message' => 'Demand not found'], 404);

        $user = User::find($demand->user_id);
        Mail::to($user->email)->send(new DemandState($demand, 'not_accepted'));

        return response()->json(['message' => 'Demand accepted successfully']);
    }
}
