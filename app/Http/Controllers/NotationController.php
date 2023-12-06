<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notation;

class NotationController extends Controller
{
    public function Notation()
    {
        $scores = Notation::GetNotationQuiz();
        $notesQuiz = [];
        $counterUn = 0;
        foreach ($scores as $resultUn) {
            $notesQuiz["key_" . $counterUn++] = (float) $resultUn->AverageNote;
        }

        $scores = Notation::GetNotationQuestion();
        $notesQuestion = [];
        $counterDeux = 0;
        foreach ($scores as $resultDeux) {
            $notesQuestion["key_" . $counterDeux++] = (float) $resultDeux->AverageNote;
        }

        $countVotingPlayer = Notation::GetVotingPlayer();

        return view('Notation', compact('notesQuestion', 'notesQuiz', 'countVotingPlayer'));
    }
}
