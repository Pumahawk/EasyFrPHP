<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use EasyFrPHP\Option\Option;

final class OptionTest extends TestCase {
  public function testGetOptionFromFile(){
    $opt = new Option();
    $opt -> basePath = __DIR__ . '/assets/';
    $actual = $opt -> readOptions('option');

    $expected = require(__DIR__.'/assets/option.php');
    $this -> assertSame($expected, $actual);
  }
}
