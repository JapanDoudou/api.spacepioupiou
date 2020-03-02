<?php

namespace App\Controller;

use App\Entity\UserData;
use App\Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $email = $request->request->get('email');

        /* We check that the username is not already in use */
        if ($this->CheckKey("username", $username)){
            return new Response(sprintf("Username Already Exist"),406);
        }
        /* We check that the email is valid and not already in use */
        if ($this->CheckEmail($email)) {
            if ($this->CheckKey("email", $email)) {
                return new Response(sprintf("Email already in use. Do you forgot your password ?",406));
            }

            /* Enregistement des données du nouvel utilisateur */
            $user = new User();
            $user->setPassword($encoder->encodePassword($user, $password));
            $user->setUsername($username);
            $user->setEmail($email);
            /* We initialize the datas of the new User ! */
            $userData = new UserData();
            $user->setUserData($userData);
            $em->persist($user);
            $em->persist($userData);
            $em->flush();

            return new Response(sprintf('User %s successfully created', $user->getUsername()));
        } else {
            return new Response(sprintf("Email is not in correct format",406));
        }
    }

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }

    public function CheckKey($key, $data):bool
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findBy([$key => $data]);
        if ($user != null){
            return true;
        } else {
            return false;
        }
    }

    public function CheckEmail($email):bool {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }
}
