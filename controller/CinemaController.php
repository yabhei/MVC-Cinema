<?php

namespace Controller;

use Model\Connect;

class CinemaController{


    // lister les films 

    public function ListFilms(){
            $pdo = Connect::seConnecter();
            
            $requete = $pdo->query("
            SELECT id_film, nom_film , date_sortie
            FROM film 
           
            ");
            require "view/ListFilms.php";
    }

    public function ListActeurs(){
        $pdo = Connect::seConnecter();
        
        $requete = $pdo->query("
        SELECT  a.id_acteur , p.prenom_personne, p.nom_personne  , p.date_naissance , p.sexe_personne
        FROM acteur a, personne p  
        WHERE a.id_personnage = p.id_personnage
        ");
        require "view/ListActeurs.php";
}

public function ListRealisateurs(){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->query("
    SELECT r.id_realisateur , p.prenom_personne ,p.nom_personne 
    FROM realisateur r, personne p  
    WHERE r.id_personnage = p.id_personnage
    ");
    require "view/ListRealisateurs.php";
}

public function ListGenres(){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->query("
    SELECT id_genre ,libelle
    FROM genre 
    ");
    require "view/ListGenres.php";
}


public function ListRole(){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->query("
    SELECT id_role, nom_role
    FROM role 
    ");
    require "view/ListRole.php";
}

public function detailGenre($id){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->prepare("
    SELECT   f.nom_film , g.libelle 
    FROM   film f ,  posseder po , genre g 
    WHERE po.id_genre = g.id_genre 
    AND po.id_film = f.id_film
    AND g.id_genre = :id
    ");
        $requete->execute(["id"=>$id]);
    require "view/detailGenre.php";
}

public function detailRole($id){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->prepare("
    SELECT r.nom_role , p.prenom_personne AS fn , p.nom_personne AS ln , f.nom_film AS nomf
    FROM role r , personne p , jouer j , film f , acteur a 
    WHERE j.id_film = f.id_film 
    AND j.id_role = r.id_role 
    AND j.id_acteur = a.id_acteur 
    AND a.id_personnage = p.id_personnage 
    AND r.id_role = :id"
    );
        $requete->execute(["id"=>$id]);
    require "view/detailRole.php";
}

public function detailFilm($id){
    $pdo = Connect::seConnecter();
    $pdcast = Connect::seConnecter();
    $requete = $pdo->prepare("
    SELECT  f.nom_film , f.date_sortie , f.duree ,f.image , p.prenom_personne , g.libelle 
    FROM   film f , realisateur r , posseder po , genre g ,personne p
    WHERE po.id_genre = g.id_genre 
    AND po.id_film = f.id_film
    AND f.id_realisateur = r.id_realisateur
    AND r.id_personnage = p.id_personnage
    AND f.id_film = :id
    
    ");
    $requete->execute(["id"=>$id]);

    $castreque = $pdcast->prepare("
    SELECT  p.prenom_personne , p.nom_personne , r.nom_role 
    FROM   film f , personne p , acteur a ,role r , jouer j 
    WHERE j.id_film = f.id_film
    AND j.id_role = r.id_role
    AND  j.id_acteur = a.id_acteur
    AND a.id_personnage = p.id_personnage
    AND f.id_film = :id
    ");

        $castreque->execute(["id" => $id]);
       
    require "view/detailFilm.php";
}


public function detailActeur($id){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->prepare("
    SELECT  p.prenom_personne , p.nom_personne , p.date_naissance, p.sexe_personne, f.nom_film AS nomf
    FROM  personne p , film f , acteur a, jouer j  
    WHERE j.id_film = f.id_film 
    AND j.id_acteur = a.id_acteur 
    AND a.id_personnage = p.id_personnage 
    AND a.id_acteur = :id"
    );
        $requete->execute(["id"=>$id]);
    require "view/detailActeur.php";
}

public function detailRealisateur($id){
    $pdo = Connect::seConnecter();
    
    $requete = $pdo->prepare("
    SELECT  p.prenom_personne , p.nom_personne ,f.nom_film
    FROM  personne p , film f ,realisateur r 
    WHERE r.id_personnage = p.id_personnage 
    AND r.id_realisateur = f.id_realisateur
    AND r.id_realisateur = :id"
    );
        $requete->execute(["id"=>$id]);
    require "view/detailRealisateur.php";
}

}


?>