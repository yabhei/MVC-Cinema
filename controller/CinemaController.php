<?php

namespace Controller;

use Model\Connect;

class CinemaController
{


    // lister les films 

    public function ListFilms()
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
            SELECT id_film, title_film , year_film,id_director
            FROM film 
           
            ");
        require "view/ListFilms.php";
    }

    public function ListActeurs()
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
        SELECT  a.id_actor , p.fname_person, p.lname_person  , p.birthday_person , p.sex_person,p.image,p.id_person
        FROM actor a, person p  
        WHERE a.id_person = p.id_person
        ");
        require "view/ListActeurs.php";
    }

    public function ListRealisateurs()
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
    SELECT r.id_director , p.fname_person ,p.lname_person 
    FROM director r, person p  
    WHERE r.id_person = p.id_person
    ");
        require "view/ListRealisateurs.php";
    }

    public function ListGenres()
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
    SELECT id_category ,name_category
    FROM category 
    ");
        require "view/ListGenres.php";
    }


    public function ListRole()
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
    SELECT id_role, name_role
    FROM role 
    ");
        require "view/ListRole.php";
    }

public function detailGenre($id)
{
    $pdo = Connect::seConnecter();

    $requete = $pdo->prepare("
SELECT   f.title_film , g.name_category 
FROM   film f ,  belong_category po , category g 
WHERE po.id_category = g.id_category 
AND po.id_film = f.id_film
AND g.id_category = :id
");
    $requete->execute(["id" => $id]);
    require "view/detailGenre.php";
}

public function detailRole($id)
{
    $pdo = Connect::seConnecter();

    $requete = $pdo->prepare("
SELECT r.name_role , p.fname_person AS fn , p.lname_person AS ln , f.title_film AS nomf
FROM role r , person p , play j , film f , actor a 
WHERE j.id_film = f.id_film 
AND j.id_role = r.id_role 
AND j.id_actor = a.id_actor 
AND a.id_person = p.id_person 
AND r.id_role = :id"
    );
    $requete->execute(["id" => $id]);
    require "view/detailRole.php";
}

public function detailFilm($id)
{
    $pdo = Connect::seConnecter();
  
    $requete = $pdo->prepare("
SELECT  f.id_film , f.title_film , f.year_film , f.duration_film ,f.image , p.fname_person , g.name_category 
FROM   film f , director r , belong_category po , category g ,person p
WHERE po.id_category = g.id_category 
AND po.id_film = f.id_film
AND f.id_director = r.id_director
AND r.id_person = p.id_person
AND f.id_film = :id

");
    $requete->execute(["id" => $id]);

    $castreque = $pdo->prepare("
SELECT  p.fname_person , p.lname_person , r.name_role 
FROM   film f , person p , actor a ,role r , play j 
WHERE j.id_film = f.id_film
AND j.id_role = r.id_role
AND  j.id_actor = a.id_actor
AND a.id_person = p.id_person
AND f.id_film = :id
");

    $castreque->execute(["id" => $id]);

    require "view/detailFilm.php";
}


public function detailActeur($id)
{
    $pdo = Connect::seConnecter();

    $requete = $pdo->prepare("
SELECT  p.fname_person , p.lname_person , p.birthday_person, p.sex_person, f.title_film AS nomf,p.image
FROM  person p , film f , actor a, play j  
WHERE j.id_film = f.id_film 
AND j.id_actor = a.id_actor 
AND a.id_person = p.id_person 
AND a.id_actor = :id"
    );
    $requete->execute(["id" => $id]);
    require "view/detailActeur.php";
}


public function detailRealisateur($id)
{
    $pdo = Connect::seConnecter();

    $requete = $pdo->prepare("
SELECT  p.fname_person , p.lname_person ,f.title_film
FROM  person p , film f ,director r 
WHERE r.id_person = p.id_person 
AND r.id_director = f.id_director
AND r.id_director = :id"
    );
    $requete->execute(["id" => $id]);
    require "view/detailRealisateur.php";
}

public function ajouterRole($id,$name){
      
    $pdo = Connect::seConnecter();

    $ajouter = $pdo->prepare("
    INSERT INTO role (id_role, name_role)
    VALUE (:id_role,:name_role)
    
    ");

    $ajouter->execute([':id_role'=>$id, ':name_role'=>$name]);
    

    $requete = $pdo->query("
SELECT id_role, name_role
FROM role 
");
    require "view/ListRole.php";
    

}

public function ajouterGenre($id,$name){
    $pdo = Connect::seConnecter();

    $ajouter = $pdo->prepare("
    INSERT INTO category (id_category, name_category)
    VALUE (:id_category,:name_category)
    
    ");

    $ajouter->execute([':id_category'=>$id, ':name_category'=>$name]);

    $requete = $pdo->query("
    SELECT id_category ,name_category
    FROM category 
    ");
        require "view/ListGenres.php";

}

public function ajouterFilm($id,$title,$year,$duration,$idd){
    $pdo = Connect::seConnecter();

    $ajouter = $pdo->prepare("
    INSERT INTO film (id_film, title_film,year_film,duration_film,id_director)
    VALUE (:id_film, :title_film,:year_film,:duration_film,:id_director)
    
    ");

    $ajouter->execute([':id_film'=>$id, ':title_film'=>$title,':year_film'=>$year,':duration_film'=>$duration, ':id_director'=>$idd]);

    // $ajoutgenre = $pdo->prepare("
    // INSERT INTO category ()
    // VALUE (:id_film, :title_film,:year_film,:duration_film,:id_director)
    // ")
    $requete = $pdo->query("
    SELECT id_film, title_film , year_film,id_director
    FROM film 
   
    ");
require "view/ListFilms.php";

}



}


?>