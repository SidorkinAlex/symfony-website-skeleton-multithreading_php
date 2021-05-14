<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.04.21
 * Time: 19:43
 */
namespace App\Controller;

use App\DDD\Actions\AddToRecognitionList;
use App\Service\DriverWorkerTomita;
use App\Service\RecognitionList;
use App\Service\Validator;
use Redis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Uid\Uuid;

class Resume extends AbstractController
{

    /**
     * @Route("/testthreads", name="test")
     */
    public function testpars(): Response
    {
        dd('lksajdfl');
        return new Response("sadfasdf");
    }
}