<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/api/auth')]
class AuthController extends AbstractController
{
    #[Route('/register', name: 'auth_register', methods: ['POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        // Validación básica
        if (empty($data['email']) || empty($data['password'])) {
            return $this->json(['error' => 'Email and password are required'], 400);
        }

        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword($hasher->hashPassword($user, $data['password']));
        $user->setRoles(['ROLE_USER']);
        $user->setCivilite($data['civilite'] ?? '');
        $user->setPrenom($data['prenom'] ?? '');
        $user->setNom($data['nom'] ?? '');
        $user->setAdresse($data['adresse'] ?? '');
        $user->setVille($data['ville'] ?? '');
        $user->setCodePostal($data['codePostal'] ?? '');
        $user->setPays($data['pays'] ?? 'France');
        $user->setTelephone($data['telephone'] ?? '');
        $user->setProfileType($data['profileType'] ?? 'Détenteur');

        $em->persist($user);
        $em->flush();

        return $this->json([
            'message' => 'User created successfully',
            'email' => $user->getEmail()
        ], 201);
    }

    #[Route('/login', name: 'api_login', methods: ['POST'])]
    public function login(#[CurrentUser] ?User $user): JsonResponse
    {
        if (null === $user) {
            return $this->json(['message' => 'missing credentials'], 401);
        }

        return $this->json(['user' => $user->getUserIdentifier()]);
    }
}
