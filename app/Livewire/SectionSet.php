<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;

class SectionSet extends Component
{
    public string $section;

    public function submit(){
        $this->validate([
            'section' => 'required|min:3|string'
        ]);

        Section::create(['name' => $this->section]);
        session()->flash('success', 'Question Added');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.section-set');
    }
}
