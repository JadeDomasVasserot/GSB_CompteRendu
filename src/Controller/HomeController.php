<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * affiche la page home
     */
    public function index()
    {
        return $this->render('Home/home.html.twig');
    }
    /**
     * @Route("/connexion", name="app_connexion", methods="POST")
     * connecte l'utilisateur
     */
    public function authentification(Request $request, SessionInterface $session)
    {
        $login = $_POST["inputUser"];
        $password = $_POST["inputPassword"];
        var_dump($login, $password);
        try{
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy([
                    'login' => $login,
                ]);
            if($user == $login && password_verify($password, $user->getPassword())){
                $id = $user->getId();
                $nom = $user->getNom();
                $prenom = $user->getPrenom();
                $adresse = $user->getAdresse();
                $cp = $user->getCp();
                $ville = $user->getVille();
                $dateEmbauche = $user->getDateembauche();

                    $session->set('id',$id);
                    $session->set('nom',$nom);
                    $session->set('prenom',$prenom);
                    $session->set('adresse',$adresse);
                    $session->set('cp',$cp);
                    $session->set('ville',$ville);
                    $session->set('dateEmbauche',$dateEmbauche);
                    
                    $response = new Response();
                    $response->setContent(json_encode(['Id'=> $id,
                                                        'Name' => $name,
                                                        'LastName' => $lastname,
                                                        'Level' => $level,
                                                        'roles' => $session->get('roles'),
                                                        'margin' => $session->get('margin'),
                                                        'email' => $session->get('email'),
                                                        ]));


                    $response->headers->set('Content-Type', 'application/json');

                    return $response;
                }
                else
                {
                    $response = new Response();

                    return $response->setStatusCode(500);
                }
        }   
        catch (\Exception $err)
        {
            $response = new Response();
            return $response->setStatusCode(500);
        }
    }
     /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion(SessionInterface $session){

        if($session->get('id' != null))
        {
            $session->clear();
        }
    }
}