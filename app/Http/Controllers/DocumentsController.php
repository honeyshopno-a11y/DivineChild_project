<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function DocumentList()
    {
        $data['document_data'] = Documents::with('category')->get();

        return view('admin.Document.Document_list', $data);
    }

    public function DocumentAddEdit($slug)
    {
        $data['category_data'] = Category::all();

        if ($slug == 'add') {
            $data['document_data'] = '';
        } else {
            $data['document_data'] = Documents::find($slug);
        }

        return view('admin.Document.Document_store', $data);
    }

    public function DocumentStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'document_name.*' => 'required'
        ]);

        foreach ($request->document_name as $doc) {
            Documents::create([
                'category_id' => $request->category_id,
                'document_name' => $doc
            ]);
        }

        return redirect()->route('document-list')
            ->with('success', 'Documents Added Successfully');
    }

    public function DocumentDelete($id)
    {
        $data = Documents::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('document-list')
            ->with('success', 'Document Deleted Successfully');
    }
}
