<?php

namespace App\Http\Livewire;

use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $record, $subject, $review, $content_id, $rate;

    public function mount($id)
    {
        $this->record = Content::findOrFail($id);
        $this->content_id = $this->record->id;
    }
    public function render()
    {
        return view('livewire.review');
    }
    private function resetInput()
    {
        $this->subject = null;
        $this->review = null;
        $this->rate = null;
        $this->content_id = null;
        $this->ip = null;
    }
    public function store()
    {
        $this->validate([
            'subject' =>'required|min:5',
            'review' =>'required|min:10',
            'rate' => 'required'
        ]);
        \App\Models\Review::create([
            'content_id' =>$this->content_id,
            'user_id' => Auth::id(),
            'ip' =>$_SERVER['REMOTE_ADDR'],
            'rate' => $this->rate,
            'subject' => $this->subject,
            'review' => $this->review
        ]);
        session()->flash('message', 'Review sent successfully ');
        $this->resetInput();
    }
}
