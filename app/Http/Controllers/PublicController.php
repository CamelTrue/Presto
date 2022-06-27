<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home() {
        $announces = Announce::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage', compact('announces'));
    }
    
    public function announceByCategory(Category $category) {
        $announces = $category->announces()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        return view('category.announces', compact('category', 'announces'));
    }
    
    public function show(Announce $announce) {
        return view('category.show', compact('announce'));
    }
    
    public function search(Request $request) {
        $q = $request->input('q');
        $announces = Announce::search($q)->where('is_accepted', true)->get();
        
        return view('search', compact('q', 'announces'));
    }
    
    public function contactUs() {
        return view('contactUs');
    }
    
    public function contactSubmit(Request $request) {
        $user = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        
        $user_contact = compact('user', 'email', 'message');
        
        Mail::to($email)->send(new ContactMail($user_contact));
        
        return redirect(route('home'))->with('status', 'La tua email e\' stato correttamente inoltrata');
    }
    
    public function locale($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    }
    
}