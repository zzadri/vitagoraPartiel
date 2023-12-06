<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stats;

class HomeController extends Controller
{
    public function Home()
    {
        $NbQuizz = Stats::getNumberOfQuizzes();
        $NbQuestion = Stats::getNumberOfQuestions();
        $LastPlayer = Stats::getPlayerOfLatestPlay();
        $ScoreMy = Stats::getAverageScore();
        $AverageScoresByQuiz = Stats::getAverageScoresByQuiz();
        $playerHistory = Stats::getHistoryPlay();

        return view('Dashboard', compact('NbQuizz', 'NbQuestion', 'LastPlayer', 'ScoreMy', 'AverageScoresByQuiz', 'playerHistory'));
    }
}
