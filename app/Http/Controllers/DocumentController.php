<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    public function create(Request $request)
    {
        // validation
        $request->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $project = new Document();
        $project->title = $request->title;
        $project->content = $request->content;
        $project->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Project has been created"
        ]);
    }

    public function getAll()
    {
        $documents = Document::get();

        return response()->json([
            "status" => 1,
            "message" => "Documents",
            "data" => $documents
        ], 200);

    }

    public function getById($id)
    {
        $document = Document::where("id", $id)->get();

        return response()->json([
            "status" => 1,
            "message" => "Document",
            "data" => $document
        ]);
    }

    public function update(Request $request, $id)
    {
        $document = Document::where("id", $id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            "status" => 1,
            "message" => "Document has been updated successfully",
            "data" => $document
        ]);
    }

    public function delete($id)
    {
        if (Document::where(["id" => $id])->exists()) {

            $document = Document::where("id", $id)->first();
            $document->delete();

            return response()->json([
                "status" => 1,
                "message" => "Document has been deleted successfully"
            ]);

        } else {

            return response()->json([
                "status" => 0,
                "message" => "Document not found"
            ]);

        }
    }
}
