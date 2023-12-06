<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PushData;


//todo step 1 : add new quiz
//todo step 2 : pour chacune des question verifier l'existance des tag ou les créer
//todo step 3 : créer les question en association avec le qui et les tags
//todo step 4 : créer les reponses en association avec les questions
//// step 5 : filtres les fichiers pour accepter seulement les csv

class UploadController extends Controller
{
    function UploadFile()
    {
        return view('Management');
    }


    function UploadFilePost(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file("file");

            // Vérifier si c'est un fichier CSV
            if ($file->getClientOriginalExtension() === 'csv') {
                $path = $file->storeAs('uploads', $file->getClientOriginalName());
                $filePath = storage_path('app/' . $path);

                // Vérifier si le fichier existe
                if (file_exists($filePath)) {
                    $csvAsArray = array_map(function ($line) {
                        return str_getcsv($line, ';'); // Utilisez le point-virgule comme délimiteur
                    }, file($filePath));

                    // Première ligne pour les en-têtes de colonnes
                    $headers = array_shift($csvAsArray);

                    // Tableau pour stocker les données formatées
                    $data = [];

                    // Parcourir les lignes de données
                    foreach ($csvAsArray as $row) {
                        $rowData = [];
                        foreach ($headers as $index => $header) {
                            // Assurez-vous que chaque élément est en UTF-8
                            $rowData[$header] = mb_convert_encoding($row[$index], 'UTF-8', 'UTF-8');
                        }
                        $data[] = $rowData;
                    }

                    // Retourner les données au format JSON (ou utilisez une vue pour l'affichage)
                    // return response()->json($data);

                    // PushData::pushCategories($data);
                    // PushData::pushQuestion($data);
                    PushData::pushReponses($data);

                    $message_success = 'Les données ont bien été envoyées.';
                    // Supprimer le fichier temporaire après utilisation
                    Storage::delete($path);
                    return view('QuizzManagement', compact('message_success'));
                } else {
                    // Message d'erreur personnalisé si le fichier n'a pas pu être trouvé
                    return redirect()->back()->withErrors(['error' => 'Le fichier CSV n\'a pas pu être trouvé.']);
                }
            } else {
                // Message d'erreur personnalisé si le fichier n'est pas un fichier CSV
                return redirect()->back()->withErrors(['error' => 'Seuls les fichiers CSV sont autorisés.']);
            }
        } else {
            // Message d'erreur personnalisé si aucun fichier n'a été téléchargé
            return redirect()->back()->withErrors(['error' => 'Aucun fichier n\'a été téléchargé.']);
        }
    }



}
