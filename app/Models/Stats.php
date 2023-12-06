<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Stats extends Model
{
    use HasFactory;

    public static function getNumberOfQuizzes()
    {
        try {
            $numberOfQuizzes = DB::table('Quiz')->count();

            // Retourner le nombre de quiz
            return $numberOfQuizzes;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }

    public static function getNumberOfQuestions()
    {
        try {
            $numberOfQuestions = DB::table('Question')->count();

            // Retourner le nombre de questions
            return $numberOfQuestions;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }

    public static function getPlayerOfLatestPlay()
    {
        try {
            $latestPlay = DB::table('Play')
                ->select('Player.Pseudo')
                ->join('Player', 'Play.playerId', '=', 'Player.Id')
                ->orderByDesc('Play.Date')
                ->first();

            // Retourner le joueur associé à la dernière partie
            return $latestPlay;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }

    public static function getAverageScore()
    {
        try {
            $averageScore = DB::table('Play')
                ->select(DB::raw('AVG(Score) AS AverageScore'))
                ->first();

            // Retourner la moyenne des scores
            return $averageScore;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }

    public static function getAverageScoresByQuiz()
    {
        try {
            $averageScoresByQuiz = DB::table('Play')
                ->select('Quiz.QuizName', DB::raw('AVG(Score) AS AverageScore'))
                ->join('Quiz', 'Play.QuizId', '=', 'Quiz.Id')
                ->groupBy('Play.QuizId', 'Quiz.QuizName')
                ->get();

            // Retourner les moyennes des scores par quiz
            return $averageScoresByQuiz;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }

    public static function getHistoryPlay()
    {
        try {
            $playerHistory = DB::table('Play')
                ->select('Player.Pseudo', 'Quiz.QuizName', 'Play.Date')
                ->join('Player', 'Play.playerId', '=', 'Player.Id')
                ->join('Quiz', 'Play.quizId', '=', 'Quiz.Id')
                ->orderBy('Play.Date', 'desc')
                ->get();

            // Retourner les moyennes des scores par quiz
            return $playerHistory;
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            return $e->getMessage();
        }
    }
}
