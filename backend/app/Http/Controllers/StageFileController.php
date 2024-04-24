<?php

namespace App\Http\Controllers;

use App\Models\StageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StageFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(StageFile::all());
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
            'file' => 'required|mimes:pdf,doc,docx|max:3000',
        ]);

        $file = $request->file('file');

        $stageFile = new StageFile();
        $stageFile->title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        Storage::disk('public')->delete('stageFiles/' . $file->getClientOriginalName());
        StageFile::where('path', 'stageFiles/' . $file->getClientOriginalName())->forceDelete();
        
        $imagePath = 'stageFiles/' . $file->getClientOriginalName();
        Storage::disk('public')->put($imagePath, file_get_contents($file));

        $stageFile->path = $imagePath;
        $stageFile->extension = $file->extension();
        $stageFile->size = $file->getSize();
        $stageFile->save();

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
        $stageFile = StageFile::find($id);
        if (!$stageFile) return response()->json(['message' => 'file not found'], 404);

        return response()->json($stageFile);
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
        $stageFile = StageFile::find($id);
        if (!$stageFile) return response()->json(['message' => 'file not found'], 404);

        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:3000',
        ]);

        $file = $request->file('file');

        $stageFile->title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        Storage::disk('public')->delete($stageFile->path);
        $imagePath = 'stageFiles/' . $file->getClientOriginalName();
        Storage::disk('public')->put($imagePath, file_get_contents($file));

        $stageFile->path = $imagePath;
        $stageFile->extension = $file->extension();
        $stageFile->size = $file->getSize();
        $stageFile->save();

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
        $stageFile = StageFile::find($id);
        if (!$stageFile) return response()->json(['message' => 'file not found'], 404);

        Storage::disk('public')->delete($stageFile->path);
        $stageFile->delete();
        return response()->json(['message' => 'file deleted successfully']);
    }

    public function download($id)
    {
        $stageFile  = StageFile::find($id);
        if (!$stageFile) return response()->json(['message' => 'file not found'], 404);

        if (!Storage::disk('public')->exists($stageFile->path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return Storage::disk('public')->download($stageFile->path);
    }
}
