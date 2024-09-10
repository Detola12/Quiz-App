<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class QuestionSet extends Component
{
    public int $optionsCount;
    public array $options;
    public Collection|array $sections;
    public int $section = 1;
    public int $correctAnswer = 0;
    public string $question;

    public function mount()
    {
        $this->optionsCount = 0;
        $this->question = '';
        $this->sections = Section::all();

    }

    public function addOption(){
        if($this->optionsCount < 5){
            $this->options[$this->optionsCount] = '';
            $this->optionsCount++;
        }
    }

    public function removeOption(){
        if($this->optionsCount > 1){
            unset($this->options[$this->optionsCount - 1]);
            $this->optionsCount--;
        }
    }

    public function submit(){
        $this->validate([
            'question' => 'required|string|unique:questions,description',
            'options.*' => 'string|nullable',
            'correctAnswer' => 'int|required',
            'section' => 'nullable|int'
        ]);
        $answer = match ($this->correctAnswer)
        {
            0 => 'a', 1 => 'b',2 => 'c',3 => 'd',4 => 'e', default => false
        };
        try {
            if ($answer == false) {
                throw new \Exception('Invalid answer');
            }
            Question::create([
                'description' => $this->question,
                'section_id' => $this->section,
                'answer_a' => $this->options[0],
                'answer_b' => $this->options[1],
                'answer_c' => $this->options[2] ?? null,
                'answer_d' => $this->options[3] ?? null,
                'answer_e' => $this->options[4] ?? null,
                'correct_answer' => $answer
            ]);
            session()->flash('success', 'Question Added');
            $this->reset(['question','section','correctAnswer','options','optionsCount']);
        }
        catch (\Exception $exception){
            Log::error('An error occurred: ' . $exception);
            return $this->addError('error', $exception);
        }
    }

    public function render()
    {
        return view('livewire.question-set');
    }
}
