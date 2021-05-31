<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\note;
use App\Models\Day;

use Illuminate\Http\Request;



class WeekController extends Controller
{
    public function index(){
        $notes = note::all();

        return view('calendar.index',
        compact('notes'));
       
    }

    public function create(){
       
        $categories = Category::all();
        $days = Day::all();
        $note = new note();
        

        return view('calendar.create',
        compact('categories', 'note', 'days'));
    }
    
    
    public function store(){
            
            note::create($this->validateRequest());
            return redirect()->route('calendar.index');
    }
    


    


    public function show(note $notes){
        $notes = note::find($notes)->first();
        return view('calendar.show',compact('notes'));
    }


    public function edit(note $note){
        $days = Day::all();
        return view('calendar.edit',compact('note','days'));
    }
    


    public function update(note $note){
        $note ->update($this->validateRequest());


        return redirect()->route('calendar.show',$note->id);
    }


    public function destroy(note $note){
        $note->delete();
        return redirect()->route('calendar.index');
    }


    private function validateRequest(){
        return request()->validate([
            'giorno_id' => 'required|unique:notes',
            'tipologia_id' => 'required',
            'giorno_raccolta_id' => 'required',
            'ora_inizio' => 'required',
            'ora_fine' => 'required'
        ]);
    }

    

}