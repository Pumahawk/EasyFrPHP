<?php

namespace EasyFrPHP\Console;

use EasyFrPHP\Option\Option;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use \ZipArchive;

class Build extends Command
{
    protected function configure()
    {
      $this ->setName('dev:build-base')
        ->setDescription('Create a simple Zip file with all file.')

     // the full command description shown when running the command with
     // the "--help" option
     ->setHelp('Simple build script. Create a file Zip.')
 ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $optReader = new Option();
      $opt = $optReader -> readOptions('dev/base-build');
      shell_exec('zip -r '.$opt['name'].' '.join(' ', $opt['path']).' -x '.join(' ', $opt['exclude']));
    }
}
