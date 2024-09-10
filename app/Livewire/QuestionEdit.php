<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class QuestionEdit extends Component
{
    public string $description;
    public Question $question;
    public array $options;
    public int $section;
    public Collection|array $sections;
    public string $correct;
    public int $optionsCount;

    public function mount(Question $question){
        $this->question = $question;
        $this->sections = Section::all();
        $this->description = $question->description;
        $this->options = array_filter([$question->answer_a, $question->answer_b, $question->answer_c, $question->answer_d, $question->answer_e ?? null], null);
        $this->section = $question->section_id;
        $this->correct = $question->correct_answer;
        $this->optionsCount = count($this->options);
    }

    public function addOption(){
        if($this->optionsCount < 5){
            $this->options[$this->optionsCount] = '';
            $this->optionsCount++;
        }
    }
    public function submit()
    {
        $this->validate([
            'description' => 'required|string',
            'options.*' => 'string|nullable',
            'correct' => 'string|required',
            'section' => 'nullable|int'
        ]);

        DB::beginTransaction();

        $this->question->description = $this->description ?? $this->question->description;
        $this->question->section_id = $this->section ?? $this->question->section_id;
        $this->question->answer_a = $this->options[0] ?? $this->question->answer_a;
        $this->question->answer_b = $this->options[1] ?? $this->question->answer_b;
        $this->question->answer_c = $this->options[2] ?? $this->question->answer_c;
        $this->question->answer_d = $this->options[3] ?? $this->question->answer_d;
        $this->question->answer_e = $this->options[4] ?? $this->question->answer_e;
        $this->question->correct_answer = $this->correct ?? $this->question->correct_answer;

        $this->question->save();
        DB::commit();
        session()->flash('success', 'Question Added');
        $this->redirect(route('question.show'));
    }


    public function render()
    {

        return view('livewire.question-edit');
    }
}
