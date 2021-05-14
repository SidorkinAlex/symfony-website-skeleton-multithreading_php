<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.04.21
 * Time: 9:23
 */
namespace App\Command;

use App\Service\CThread;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CustomCommand extends Command{
    protected $projectDir;
    protected static $defaultName="app:ThreadStart";
    public function __construct($projectDir)
    {
        $this->projectDir = $projectDir;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("test command")
            ->addArgument("keyThread",InputArgument::OPTIONAL,"test description string","");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $key=$input->getArgument('keyThread');
        CThread::shell_start($key);
    }
}