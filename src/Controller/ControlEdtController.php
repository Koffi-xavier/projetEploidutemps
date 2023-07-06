<?php

namespace App\Controller;

use App\Entity\Agents;
use App\Form\AgentFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControlEdtController extends AbstractController
{
    #[Route('/controle/ajout', name: 'app_control_edt')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $agent = new Agents();

        $form = $this->createForm(AgentFormType::class, $agent);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $agent->setCreatedAt = new \Datetime();

            
            $entityManager->persist($agent);
            $entityManager->flush();

           
            $this->addFlash('success', 'Votre agent a été enregistrée avec succès');

            // return $this->redirectToRoute('demande_add', ['id' => $demande->getId()]);
            return $this->redirectToRoute('main');
        }

        return $this->render('control_edt/controle_edt.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }


}
