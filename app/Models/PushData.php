<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class PushData extends Model
{
    use HasFactory;



    public static function pushQuestion($data)
    {
        try {
            foreach ($data as $entry) {
                // Vérifier si 'QuestionName' est nul ou une chaîne vide
                if ($entry['QuestionName'] === null || $entry['QuestionName'] === '') {
                    // Passer à la prochaine entrée
                    continue;
                }

                $QuestionName = $entry['QuestionName'];

                // Insérer les données dans la base de données
                DB::table('Question')->insert([
                    'QuestionName' => $QuestionName,
                    'QuestionDesc' => "Aucune Description",
                    'CreateAt' => date('Y-m-d H:i:s'),
                    'Played' => 0,
                    'Succes' => 0,
                    'CategoryId' => 1
                ]);
            }

            // Vous pouvez retourner un message ou une valeur en fonction de vos besoins
            $message_success = 'Les data on bien été envoyer';
            return view('QuizzManagement', compact('message_success'));
        } catch (\Exception $e) {
            $message_error = 'une erreur est survenue';
            return view('QuizzManagement', compact('message_error'));
        }
    }


    // Fonction pour extraire les catégories
    public static function pushCategories($data)
    {
        try {
            foreach ($data as $entry) {
                // Pour chaque catégorie de 1 à 3
                for ($i = 1; $i <= 3; $i++) {
                    $categoryColumnName = 'Category_' . $i;
                    $categoryValue = $entry[$categoryColumnName];

                    // Vérifier si la catégorie est nulle ou une chaîne vide
                    if ($categoryValue === null || $categoryValue === '') {
                        // Passer à la prochaine catégorie
                        continue;
                    }

                    // Vérifier si la catégorie existe déjà dans la base de données
                    $existingCategory = DB::table('Category')
                        ->where('CategoryName', $categoryValue)
                        ->first();

                    // Si la catégorie n'existe pas, l'insérer dans la base de données
                    if (!$existingCategory) {
                        DB::table('Category')->insert(['CategoryName' => $categoryValue]);
                    }
                }
            }

            // Si nous arrivons ici, les données ont été insérées avec succès
            $message_success = 'Les données ont bien été envoyées.';
            return view('QuizzManagement', compact('message_success'));
        } catch (\Exception $e) {
            // Gérer les erreurs ici
            $message_error = 'Une erreur est survenue.';
            return view('QuizzManagement', compact('message_error'));
        }
    }




    // Fonction pour extraire les réponses

    public static function pushReponses($data)
    {
        try {
            // Récupérer la dernière question insérée
            $lastQuestionId = DB::select('SELECT TOP 1 Id FROM Question ORDER BY Id DESC');

            foreach ($data as $entry) {
                $answers = [];

                for ($i = 1; $i <= 4; $i++) {
                    $answerColumnName = 'Answer_' . $i;
                    $answerDescColumnName = 'Answer_Desc';
                    $correctColumnName = 'correct_' . $i;

                    $answerValue = $entry[$answerColumnName];
                    $answerDescValue = $entry[$answerDescColumnName];
                    $correctValue = $entry[$correctColumnName];

                    // Vérifier si l'une des colonnes de réponse est nulle, une chaîne vide ou dépasse 100 caractères
                    if ($answerValue === null || $answerValue === '' || strlen($answerValue) > 100) {
                        // Passer à la prochaine entrée
                        continue;
                    }

                    // Insérer les données dans la table 'Reponses'
                    $reponseId = DB::table('Answer')->insertGetId([
                        'AnswerName' => $answerValue,
                        'AnswerDesc' => $answerDescValue,
                        'CreateAt' => now() // Utilisez la fonction now() pour obtenir la date et l'heure actuelles
                    ]);

                    // var_dump($lastQuestionId);
                    // Lier la réponse à la question en utilisant la table de liaison
                    DB::table('QuestionAnswer')->insert([
                        //todo finir la liaison entre les question et les responses
                        'QuestionId' => $lastQuestionId[0]->Id,
                        'AnswerId' => $reponseId,
                        'Correct' => false //! probleme a voir ici
                    ]);
                }
            }

            // Si nous arrivons ici, les données ont été insérées avec succès
            $message_success = 'Les réponses ont bien été envoyées.';
            return view('QuizzManagement', compact('message_success'));
        } catch (\Exception $e) {
            return var_dump($e);
        }
    }
}
