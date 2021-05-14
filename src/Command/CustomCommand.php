<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.04.21
 * Time: 9:23
 */
namespace App\Command;

use App\Connection\RedisConnection;
use App\DDD\Actions\ParseRecognitionList;
use App\Service\DriverWorkerTomita;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CustomCommand extends Command{
    protected $projectDir;
    protected static $defaultName="app:parseResume";
    public function __construct($projectDir)
    {
        $this->projectDir = $projectDir;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("test command")
            ->addArgument("test",InputArgument::OPTIONAL,"test description string","111");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $driverWorkerTomita = new DriverWorkerTomita();
        $driverWorkerTomita->startWorkerInDB();
        $parseRecognitionList = new ParseRecognitionList($this->projectDir);
        $start = true;
        while ($start){
            $start = $parseRecognitionList->recognition();
        }
        $driverWorkerTomita->rmWorkerInDB();
//        file_put_contents($this->projectDir."/test.log","kaka",FILE_APPEND);
//        dd($this->projectDir);
    }
}