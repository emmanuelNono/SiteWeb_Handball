<?php


class Authentification
{
    public function verificationUtilisateur($db, $user, $mdp)
    {
        $sql_selection = $db->prepare("SELECT * FROM personne where per_email =:login and per_mdp = :mdp");
        $sql_selection = $db->bindParam(':login', $user);
        $sql_selection = $db->bindParam(':mdp' , $mdp);
        $rs_selection = $db->execute($sql_selection);
        //var_dump($rs_selection);
        //exit;
        return $rs_selection;
    }
}