<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function inbox()
    {
        $data['message'] = ContactUs::latest()->get();
        return view('contacts.inbox', $data);
    }
    public function show($id)
    {
        $inbox = ContactUs::where('id', $id)->update(['opened' => 1]);
        
        $data['inbox'] = ContactUs::where('id', $id)->first();
        return view('contacts.view', $data);
    }

    public function compose()
    {
        return view('contacts.compose');
    }
    public function post_compose(Request $request)

    {
        $attributes = request()->validate([
            'email' => 'required|email|',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['name'] = auth()->user()->name;
        $attributes['sent_to'] = 0;

        ContactUs::create($attributes);

        return redirect('admin/inbox');

    }


    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create($attributes);

        // return back();

        return redirect('/thankyou');
    }
    public function thankyou()
    {
        return view('thankyou');
    }

    public function destroy($id)
    {
        $data = ContactUs::where('id', $id)->firstOrFail();
        $data->delete();
        return back();
    }
}
