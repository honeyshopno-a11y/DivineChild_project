<?php

namespace App\Http\Controllers;

use App\Models\TransferCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TransferCertificateController extends Controller
{
    public function transferCertificateList()
    {
        $data['transfer_certificate_data'] = TransferCertificate::all();

        return view('admin.transfer_certificate.transfer_certificate_list', $data);
    }

    public function transferCertificateAdd()
    {
        return view('admin.transfer_certificate.transfer_certificate_store');
    }

    public function transferCertificateStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = new TransferCertificate();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1000, 9999) . '.' . $extension;

            $file->move(public_path('uploads/transfer_certificate/'), $filename);

            $data->image = 'uploads/transfer_certificate/' . $filename;
        }

        $data->save();

        return redirect()
            ->route('transfer-certificate-list')
            ->with('success', 'Transfer Certificate Added Successfully.');
    }

    public function transferCertificateDelete($id)
    {
        $data = TransferCertificate::find($id);

        if ($data) {

            if ($data->image != '' && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $data->delete();
        }

        return redirect()
            ->route('transfer-certificate-list')
            ->with('success', 'Transfer Certificate Deleted Successfully.');
    }
}
