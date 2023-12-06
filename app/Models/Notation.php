<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notation extends Model
{
    use HasFactory;

    /*
    
    -- Sélection des 5 dernières dates
        WITH Dates AS (
        SELECT TOP 5
            -- Convertit la date actuelle en une date correspondant à la position de la ligne dans le résultat
            CONVERT(date, GETDATE() - ROW_NUMBER() OVER (ORDER BY (SELECT NULL))) AS Date
        FROM sys.objects
        )

        -- Calcul de la moyenne des notes pour chaque date
        SELECT
        -- Sélectionne la date de la CTE
        d.Date,
        -- Calcule la moyenne des notes pour chaque date, en traitant les valeurs NULL comme 0
        COALESCE(AVG(nq.Note), 0) AS AverageNote
        FROM
        -- Utilise la CTE pour les dates
        Dates d
        -- Jointure avec la table NotationQuiz sur la date
        LEFT JOIN NotationQuiz nq ON CONVERT(date, nq.Date) = d.Date
        GROUP BY
        -- Regroupe les résultats par date
        d.Date
        ORDER BY
        -- Trie les résultats par date de manière décroissante
        d.Date DESC;

    
    */

    public static function GetNotationQuiz()
    {
        return DB::select("
        WITH Dates AS (
            SELECT TOP 5
              CONVERT(date, DATEADD(day, -ROW_NUMBER() OVER (ORDER BY (SELECT NULL)), GETDATE() + 1)) AS Date
            FROM sys.objects
          )
          SELECT
            d.Date,
            ISNULL(AVG(nq.Note), 0) AS AverageNote
          FROM
            Dates d
            LEFT JOIN NotationQuiz nq ON CONVERT(date, nq.Date) = d.Date
          GROUP BY
            d.Date
          ORDER BY
            d.Date DESC;
          
        ");
    }

    public static function GetNotationQuestion()
    {
        return DB::select("
        WITH Dates AS (
            SELECT TOP 5
              CONVERT(date, DATEADD(day, -ROW_NUMBER() OVER (ORDER BY (SELECT NULL)), GETDATE() + 1)) AS Date
            FROM sys.objects
          )
          SELECT
            d.Date,
            ISNULL(AVG(nq.Note), 0) AS AverageNote
          FROM
            Dates d
            LEFT JOIN NotationQuestion nq ON CONVERT(date, nq.Date) = d.Date
          GROUP BY
            d.Date
          ORDER BY
            d.Date DESC;
          
        ");
    }

    public static function GetVotingPlayer()
    {
        return DB::select("
            SELECT COUNT(DISTINCT P.Id) AS NombreDeJoueurs
            FROM dbo.Player P
            WHERE P.Id IN (
                SELECT NQ.PlayerId
                FROM dbo.NotationQuiz NQ
                UNION
                SELECT NQu.PlayerId
                FROM dbo.NotationQuestion NQu
            );
        ");
    }
}
