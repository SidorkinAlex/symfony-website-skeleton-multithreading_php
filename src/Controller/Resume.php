<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.04.21
 * Time: 19:43
 */
namespace App\Controller;


use App\Service\CThread;
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
        $paramsFromThread = 3;
        $test = new CThread($paramsFromThread,function ($n){
            for ($i = 0; $i<$n; $i++){
                $pid=getmypid();
                file_put_contents('test1.log', $i." my pid is {$pid} \n", FILE_APPEND);
                sleep(3);
            }
            return 'test1';
        });
        $test->start();

        $test2 = new CThread($paramsFromThread,function ($n){
            for ($i = 0; $i<$n; $i++){
                $pid=getmypid();
                file_put_contents('test2.log', $i." my pid is {$pid} \n", FILE_APPEND);
                sleep(3);
            }
            return 'test2';
        });
        $test2->start();
        $result1 = $test->getCyclicalResult();
        $result2 = $test2->getCyclicalResult();
        dd([$result1,$result2]);
        return new Response("sadfasdf");
    }
}