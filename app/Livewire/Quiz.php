<?php

namespace App\Livewire;

use App\Models\Question;
use Illuminate\Support\Collection;
use Livewire\Component;

class Quiz extends Component
{
    public Question $question;
    public Collection $questions;
    public int $count;
    public int $result;
    public array $answers;
    public int $questionCount;

    public function mount() {
        $this->questions = Question::limit(20)->get();
        $this->questionCount = $this->questions->count();
        $this->count = 0;
        $this->question = $this->questions[$this->count];

    }

    public function next(){
        if($this->count < $this->questionCount - 1){
            $this->count++;
            $this->question = $this->questions[$this->count];
        }
        $arr = array();
        if( $this-> count > 3){

        }
    }

public function previous(){
    if($this->count > 0){
        $this->count--;
        $this->question = $this->questions[$this->count];
    }
}

public function submit()
{
    $this->validate([
        'answers.*' => 'nullable|string'
    ]);

    foreach ($this->answers as $index => $answer) {
        foreach ($this->questions as $question) {
            if ($index == $question->id) {
                if ($question->correct_answer == $answer) {
                    $this->result += 1;
                }
            }
        }

    }
}

    public function render()
    {
        return view('livewire.quiz');
    }
}
