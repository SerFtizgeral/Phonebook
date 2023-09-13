<?php

namespace App\Http\Controllers;

use App\Imports\PhonesImport;
use App\Exports\PhonesExport;

use Illuminate\Http\Request;
use App\Models\Phone;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpParser\Node\Stmt\Return_;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        $sortOption = $request->input('sort_option', 'a-z');
        $query = Phone::orderBy('lname', ($sortOption === 'a-z') ? 'asc' : 'desc')->paginate(10);

        return view('phones.index', ['phones' => $query, 'sortOption' => $sortOption]);
    }

    public function create()
    {
        return view('phones.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatePhoneData($request);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image_path'] = $imagePath; // Update 'image_path' field
        }
        

        $newPhone = Phone::create($data);

        return redirect(route('phone.index'))->with('success', 'Contact created');
    }

    public function edit(Phone $phone)
    {
        return view('phones.edit', ['phone' => $phone]);
    }

    public function update(Phone $phone, Request $request)
    {
        $data = $this->validatePhoneData($request);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image_path'] = $imagePath; // Update 'image_path' field
        }

        $phone->update($data);

        return redirect(route('phone.index'))->with('success', 'Contact updated');
    }

    public function delete(Phone $phone)
    {
        $phone->delete();
        return redirect(route('phone.index'))->with('success', 'Contact deleted');
    }

    public function search(Request $request)
    {
        $search_text = $request->input('query', '');
        $sortOption = $request->input('sort_option', 'a-z');

        $phones = Phone::where('lname', 'LIKE', '%' . $search_text . '%')
            ->orWhere('fname', 'LIKE', '%' . $search_text . '%')
            ->orWhere('address', 'LIKE', '%' . $search_text . '%')
            ->orWhere('contact', 'LIKE', '%' . $search_text . '%')
            ->orWhere('mmail', 'LIKE', '%' . $search_text . '%')
            ->orderBy('lname', ($sortOption === 'a-z') ? 'asc' : 'desc')
            ->paginate(10);

        return view('phones.search', compact('phones', 'sortOption'));
    }

    protected function validatePhoneData(Request $request)
    {
        return $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric|digits_between:1,20',
            'mmail' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            
        ]);
    }

    public function view()
    {
        return view("phones.importexportview");
    }

    public function import()
    {
        Excel::import(new PhonesImport, request()->file('file'));
    
        return redirect()->back();
    }
    public function export()
    {
        Return Excel::download(new PhonesExport , 'phones.csv');
    }
}
