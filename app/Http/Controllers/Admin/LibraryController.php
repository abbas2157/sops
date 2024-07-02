<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\LibraryDocument;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $libraries = Library::with('batch','course')->get();
        return view('admin.Library.index',compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);
        $library = new Library();
        $library->title = $request->title;
        $library->description = $request->description;
        $library->batch_id = $request->batch_id;
        $library->course_id = $request->course_id;
        $library->save();
        if ($request->hasfile('document')) {
                foreach ($request->file('document') as $file){
                    $library_document = new LibraryDocument();
                    $library_document->library_id = $library->id;
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
                $file->move(public_path('library/document'),$filename);
                $library_document->document = $filename;
                $library_document->save();
            }
        }
        $validator['success'] = 'Library Created Successfully';
        return back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $library = Library::findOrFail($id);
        $library->title = $request->title;
        $library->description = $request->description;
        $library->batch_id = $request->batch_id;
        $library->course_id = $request->course_id;
        $library->save();

        if ($request->hasfile('document')) {
            // Delete old documents
            $oldDocuments = LibraryDocument::where('library_id', $library->id)->get();
            foreach ($oldDocuments as $oldDocument) {
                if (file_exists(public_path('library/document/' . $oldDocument->document))) {
                    unlink(public_path('library/document/' . $oldDocument->document));
                }
                $oldDocument->delete();
            }

            // Save new documents
            foreach ($request->file('document') as $file) {
                $library_document = new LibraryDocument();
                $library_document->library_id = $library->id;
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() . '-' . rand(10000, 99999) . '-' . preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($fileName))) . '.' . $extension;
                $file->move(public_path('library/document'), $filename);
                $library_document->document = $filename;
                $library_document->save();
            }
        }

        $validator['success'] = 'Library Updated Successfully';
        return back()->withErrors($validator);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $library = Library::findOrFail($id);

        // Delete associated documents
        $documents = LibraryDocument::where('library_id', $library->id)->get();
        foreach ($documents as $document) {
            if (file_exists(public_path('library/document/' . $document->document))) {
                unlink(public_path('library/document/' . $document->document));
            }
            $document->delete();
        }

        // Delete the library
        $library->delete();

        $validator['success'] = 'Library Deleted Successfully';
        return back()->withErrors($validator);
    }

}
