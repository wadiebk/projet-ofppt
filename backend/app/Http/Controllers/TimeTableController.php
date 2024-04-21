<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TimeTable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TimeTableUploaded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TimeTable::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'title' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:3000',
            'classe' => 'required',
        ]);
        $file = $request->file('file');

        $timeTable = new TimeTable();
        $timeTable->title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        Storage::disk('public')->delete('timeTables/' . $file->getClientOriginalName());
        TimeTable::where('path', 'timeTables/' . $file->getClientOriginalName())->forceDelete();
        $imagePath = 'timeTables/' . $file->getClientOriginalName();
        Storage::disk('public')->put($imagePath, file_get_contents($file));

        $timeTable->path = $imagePath;
        $timeTable->extension = $file->extension();
        $timeTable->size = $file->getSize();
        $timeTable->classe = Str::upper($request->classe);
        $timeTable->save();

        $stagiaires = User::where('classe', Str::upper($request->classe))->get();
        foreach ($stagiaires as $stagiaire) {
            Mail::to($stagiaire->email)->send(new TimeTableUploaded(Str::upper($request->classe), $timeTable));
        }
        return response()->json(['message' => 'file uploaded successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timeTable = TimeTable::find($id);
        if (!$timeTable) return response()->json(['message' => 'file not found'], 404);

        return response()->json($timeTable);
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
        $timeTable = TimeTable::find($id);
        if (!$timeTable) return response()->json(['message' => 'file not found'], 404);

        $request->validate([
            // 'title' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:3000',
            'classe' => 'required',
        ]);
        $file = $request->file('file');

        $timeTable->title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        Storage::disk('public')->delete($timeTable->path);
        $imagePath = 'timeTables/' . $file->getClientOriginalName();
        Storage::disk('public')->put($imagePath, file_get_contents($file));

        $timeTable->path = $imagePath;
        $timeTable->extension = $file->extension();
        $timeTable->size = $file->getSize();
        $timeTable->classe = Str::upper($request->classe);
        $timeTable->save();

        return response()->json(['message' => 'file uploaded successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeTable = TimeTable::find($id);
        if (!$timeTable) return response()->json(['message' => 'file not found'], 404);

        Storage::disk('public')->delete($timeTable->path);
        $timeTable->delete();
        return response()->json(['message' => 'file deleted successfully']);
    }

    public function download($id)
    {
        $timeTable = TimeTable::find($id);
        if (!$timeTable) return response()->json(['message' => 'TimeTable not found'], 404);

        if (!Storage::disk('public')->exists($timeTable->path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return Storage::disk('public')->download($timeTable->path);
    }
}
