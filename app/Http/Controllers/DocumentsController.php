<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function DocumentList()
    {
        $data['document_data'] = Category::with('documents')->get();

        return view('admin.Document.Document_list', $data);
    }

    public function DocumentAddEdit($slug)
    {
        $data['category_data'] = Category::all();
        $data['form_id'] = 'add';
        $data['selected_category_id'] = '';
        $data['document_items'] = collect();

        if ($slug == 'add') {
            $data['document_data'] = '';
        } elseif (str_starts_with($slug, 'category-')) {
            $categoryId = (int) str_replace('category-', '', $slug);
            $category = Category::with('documents')->findOrFail($categoryId);

            $data['document_data'] = $category;
            $data['form_id'] = 'category-' . $category->id;
            $data['selected_category_id'] = $category->id;
            $data['document_items'] = $category->documents;
        } else {
            $document = Documents::findOrFail($slug);

            $data['document_data'] = $document;
            $data['form_id'] = $document->id;
            $data['selected_category_id'] = $document->category_id;
            $data['document_items'] = collect([$document]);
        }

        return view('admin.Document.Document_store', $data);
    }

    public function DocumentStore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'category_id' => 'required',
            'document_name' => 'required|array',
            'document_name.*' => 'required'
        ]);

        if ($id == 'add') {
            foreach ($request->document_name as $doc) {
                Documents::create([
                    'category_id' => $request->category_id,
                    'document_name' => $doc
                ]);
            }

            return redirect()->route('document-list')
                ->with('success', 'Documents Added Successfully');
        }

        if (str_starts_with($id, 'category-')) {
            $categoryId = (int) str_replace('category-', '', $id);
            Documents::where('category_id', $categoryId)->delete();

            foreach ($request->document_name as $doc) {
                Documents::create([
                    'category_id' => $request->category_id,
                    'document_name' => $doc
                ]);
            }

            return redirect()->route('document-list')
                ->with('success', 'Documents Updated Successfully');
        }

        $data = Documents::findOrFail($id);
        $data->update([
            'category_id' => $request->category_id,
            'document_name' => $request->document_name[0]
        ]);

        return redirect()->route('document-list')
            ->with('success', 'Document Updated Successfully');
    }

    public function DocumentDelete($id)
    {
        if (str_starts_with($id, 'category-')) {
            $categoryId = (int) str_replace('category-', '', $id);
            Documents::where('category_id', $categoryId)->delete();

            return redirect()->route('document-list')
                ->with('success', 'Documents Deleted Successfully');
        }

        $data = Documents::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('document-list')
            ->with('success', 'Document Deleted Successfully');
    }
}
