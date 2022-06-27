<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct() {
        $this->middleware('auth.revisor');
    }
    
    public function index(){
        $announce = Announce::where('is_accepted',null)->orderBy('created_at', 'desc')->first();
        return view('revisor.home', compact('announce'));
    }
    
    private function setAccepted($announce_id, $value){
        if ($announce_id) {
            $announce = Announce::find($announce_id);
        } else {
            $announce = Announce::where('is_accepted', '!=', null)->orderBy('updated_at', 'DESC')->first();
        }
        
        $announce->is_accepted = $value;
        $announce->save();
        return redirect(route('revisor.home'))->with('flash', 'Revisione eseguita');
    }
    
    public function accept($announce_id) {
        return $this->setAccepted($announce_id, true);
    }
    
    public function reject($announce_id) {
        return $this->setAccepted($announce_id, false);
    }
    
    public function undo() {
        return $this->setAccepted(null, null);
    }
}