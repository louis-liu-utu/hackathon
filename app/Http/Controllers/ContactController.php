<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreateContact;
use App\Http\Requests\ReplyContact;
use App\Mail\AnswerContact;
use App\Mail\ContactNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function store(CreateContact $request) {

        $inputData = $request->only(['first_name','last_name','email','country','question']);
        $inputData['is_like_receive'] = $request->input('is_like_receive',0);
        if($contact = Contact::create($inputData)) {
            try {
                Mail::to(config('app.admin_notified_mail'))->send(new ContactNotify($contact));
            } catch (\Exception $exception) {
                Log::channel('mail')->error($exception->getMessage());
            }
            return redirect()->to('contact-us-message');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }


    public function reply(ReplyContact $request, Contact $contact) {
        try {
            $contact->answer = $request->answer;
            $contact->save();
            Mail::to($contact->email)->send(new AnswerContact($contact));
            return redirect()->back()->with('success', 'send reply email successfully');
        } catch (\Exception $e) {
            Log::channel('mail')->error($e->getMessage());
        }
        return redirect()->back()->withErrors('fail to send reply email');
    }

    public function destroy(Contact $contact) {
        try {
            $contact->delete();
            return back()->with('success','delete successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
