<?php

namespace EasyFrPHP\Console;

use EasyFrPHP\Option\Option;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Console extends Command
{
    protected function configure()
    {
      $this ->setName('dev:server-run')
        ->setDescription('Run server for develop.')

     // the full command description shown when running the command with
     // the "--help" option
     ->setHelp('This command allows you to run server for develop.
     Configuation file is app/config/dev/server.php')
 ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $optReader = new Option();
      $opt = $optReader -> readOptions('dev/server');
      $output -> writeln([
        "Run built-in server.",
        "host: ". $opt['host'],
        "port: ". $opt['port'],
        "document-root: ". $opt['document-root']
      ]);
      shell_exec('php -S '.$opt['host'].':'.$opt['port'].' -t '.$opt['document-root'].' app/public/phpRouterRequest.php');
    }
}
