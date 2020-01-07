<?php
session_start();


class Authentification
{
    public function verificationUtilisateur($db, $user, $mdp)
    {
        $o_rp = $db->prepare("SELECT per_id, per_prenom, per_admin, per_redac FROM personne where per_mail =:login and per_mdp =:mdp");
        $o_rp->bindParam(':login', $user);
        $o_rp->bindParam(':mdp' , $mdp);

        if ($o_rp->execute())
        {
            while ($row = $o_rp->fetchall())
            {
                return $row;
            }
        }
        else {
            // utilisateur inconnu
            header("location:login.php?mes=error");
        }
    }
}