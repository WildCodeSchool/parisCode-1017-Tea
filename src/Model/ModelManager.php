<?php

namespace Tea\Model;



class ModelManager
{

    /**
     * function 'getAllCitations'
     * Launch SQLfunction to get all the data of the table
     * @return [array] Tableau de citations
     */
    public function getallCitations()
    {
        // Récuperation de la connection à la base de donnée
        // Rappel: pour récupérer une variable défini en dehors de la fonction, on préfixera la variable par "global"
        global $db;

        // Requete qui récupère toutes les citations
        $req = mysqli_query($db, 'SELECT * FROM citation');

        // Traitement du resultat retourné par la requete
        $citations = mysqli_fetch_all($req, MYSQLI_ASSOC);

        // Renvoie du tableau contenant toutes les citations
        return $citations;

    }

    /**
     * function 'addCitation'
     * Launch SQLfunction to add these data in the table
     * @param [string] $author Auteur de la citation
     * @param [string] $chapter Chapitre de la citation
     * @param [string] $content Contenu de la citation
     * @param [string] $date Date de la citation
     * @param [string] $image Image de la citation
     */
    public function addCitation($author, $address_edit, $content, $date, $image){
        // Récuperation de la connection à la base de donnée
        // Rappel: pour récupérer une variable défini en dehors de la fonction, on préfixera la variable par "global"
        global $db;

        // Requete d'ajout en base de donnée
        mysqli_query($db, "INSERT INTO citation (author, chapter, content, date, image) VALUES ('$author', '$address_edit', '$content', '$date', '$image')");
    }

}