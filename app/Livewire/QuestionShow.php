<?php

namespace App\Livewire;

use App\Models\Question;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionShow extends Component
{
    use WithPagination;


    public function delete($id){
        $question = Question::find($id);
        if ($question) {
            $question->delete();
        }
    }

    public function render()
    {
        return view('livewire.question-show', [
            'questions' => Question::with('section')->paginate(5)
        ]);
    }
}
