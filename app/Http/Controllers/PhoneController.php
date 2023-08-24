<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller 
{
    


    public function index(Request $request)
    {
        $sortOption = $request->input('sort_option', 'a-z');
        $query = Phone::orderBy('lname', ($sortOption === 'a-z') ? 'asc' : 'desc')->paginate(10);
    
        return view('phones.index', ['phones' => $query, 'sortOption' => $sortOption]);
    }
    
    
    
    public function create(){
        return view('phones.create');
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'contact' => 'required|numeric|digits_between:1,20',
        'mmail' => 'required|email', // Validate the email format
        
    ]);
    
    
        $newPhone = Phone::create($data);
    
        return redirect(route('phone.index'));
    }

    public function edit(Phone $phone) {
        return view('phones.edit', ['phone'=> $phone]);
    }

    public function update(Phone $phone, Request $request) {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required', 
            'address' => 'required',
            'contact' => 'required|numeric|digits_between:1,20', // Ensure the field contains only numbers
            'mmail' => 'required|email', // Validate the email format
        ]);

        $phone->update($data);

        return redirect(route('phone.index'))->with('success', 'Contact updated');
    }

    public function delete(Phone $phone) {
        $phone->delete();
        return redirect(route('phone.index'))->with('success', 'Contact updated');
    }
    public function search(Request $request) {
        $search_text = $request->input('query', '');
        $sortOption = $request->input('sort_option', 'a-z'); // Retrieve sort option from request
    
        $phones = Phone::where('lname', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('fname', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('address', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('contact', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('mmail', 'LIKE', '%' . $search_text . '%')
                        ->orderBy('lname', ($sortOption === 'a-z') ? 'asc' : 'desc') // Apply sort option
                        ->paginate(10);
    
        return view('phones.search', compact('phones', 'sortOption')); // Pass sortOption to the view
    }

    

    
     
}
