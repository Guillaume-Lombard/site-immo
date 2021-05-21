<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Form\SearchPropertyType;
use App\Model\SearchProperty;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(Request $request, SearchPropertyRepository $searchPropertyRepository, EntityManagerInterface $entityManager): Response
    {
        //$properties = $propertyRepository->findBy([], ["datePublication" => "DESC"]);

        $searchProperties = new SearchProperty();
        $searchPropertiesForm = $this->createForm(SearchPropertyType::class, $searchProperties);

        $searchPropertiesForm->handleRequest($request);

        if ($searchPropertiesForm->isSubmitted() && $searchPropertiesForm->isValid()){

            //TODO appel a la methode findHousse dans searchPropertyRepository qui est a coder
        }

        //TODO si le formulaire n'est pas utiliser afficher findAll

        return $this->render('main/home.html.twig', [

        ]);
    }

    /**
     * @Route("/detail/{id}", name="main_detail")
     */
    public function detail($id, PropertyRepository $propertyRepository): Response
    {
        $property = $propertyRepository->find($id);

        return $this->render('main/detail.html.twig', [
            "property" => $property
        ]);
    }

    /**
     * @Route("/new", name="main_new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $property = new Property();
        $propertyForm = $this -> createForm(PropertyType::class, $property);
        $property->setDatePublication(new \DateTime());

        $propertyForm->handleRequest($request);

        if ($propertyForm->isSubmitted() && $propertyForm->isValid()){

            $entityManager->persist($property);
            $entityManager->flush();

            $this->addFlash('success', 'Annonce ajoutée !');

            return $this->redirectToRoute('main_detail', ['id' => $property->getId()]);
        }

        return $this->render('main/new.html.twig', [
                'propertyForm' => $propertyForm->createView()
        ]);
    }

    /**
     * @Route("/aboutus", name="main_aboutus")
     */
    public function aboutUs(): Response
    {
        return $this->render('main/aboutUs.html.twig');
    }

    /**
     * @Route("/me", name="main_me")
     */
    public function me(): Response
    {
        return $this->render('main/me.html.twig');
    }
}
