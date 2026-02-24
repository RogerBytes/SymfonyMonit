<?php

namespace App\Controller;

use App\Entity\IotModule;
use App\Form\AddModuleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class IotModuleController extends AbstractController
{
    #[Route('/module/add', name: 'app_iot_module')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $module = new IotModule();
        $form = $this->createForm(AddModuleType::class, $module);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($module); // prépare l'objet pour la base
            $em->flush();          // envoie les données à la base

            return $this->redirectToRoute('app_iot_module'); // redirige après ajout
        }
        return $this->render('iot_module/add.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'IotModuleController',
        ]);
    }
}
