<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
	/**
	 * @Route("/health", name="sanity_check", methods={"GET"})
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function health(Request $request): Response
	{
		return new Response('OK', Response::HTTP_OK);
	}

}