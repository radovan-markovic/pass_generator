<?php declare(strict_types=1);

namespace MyApp\tests;

use PHPUnit\Framework\TestCase;
use MyApp\Password;

final class PasswordTest extends TestCase
{

    protected $classInstance;
    protected $pass_lvl = 1;
    protected $pass_lgt = 6;

    public function setUp() : void
    {
        $this->classInstance = new Password($this->pass_lvl, $this->pass_lgt);
    }

    public function testConstructorExists() {

        $this->assertTrue ( method_exists( $this->classInstance , '__construct' ), 'Constructor method does not exists' );
    }

    public function testInputArguments(){

        $this->assertIsInt($this->pass_lvl, "Password level value is not an integer.");
        $this->assertIsInt($this->pass_lgt, "Length value is not an integer.");
        $this->assertLessThanOrEqual(3, $this->pass_lvl, 'Pass level must be 1,2 or 3');
        $this->assertGreaterThanOrEqual(1, $this->pass_lvl, 'Pass level must be 1,2 or 3');
        $this->assertGreaterThanOrEqual(6, $this->pass_lgt, 'Pass length must be minimum 6');
    }
}