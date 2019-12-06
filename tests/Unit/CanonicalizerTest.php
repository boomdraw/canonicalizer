<?php

namespace Boomdraw\Canonicalizer\Tests\Unit;

use Boomdraw\Canonicalizer\Tests\TestCase;
use Canonicalizer;

class CanonicalizerTest extends TestCase
{
    public function testCanonicalization(): void
    {
        $this->assertSame(
            Canonicalizer::canonicalize('HelLo.World@HellO.cOM.Nl'),
            'hello.world@hello.com.nl'
        );
        $this->assertNull(
            Canonicalizer::canonicalize('')
        );
        $this->assertSame(
            Canonicalizer::canonicalize('', false),
            ''
        );
    }

    public function testEmailCanonicalization(): void
    {
        $this->assertSame(
            Canonicalizer::canonicalizeEmail('HelLo.World@HellO.cOM.Nl'),
            'helloworld@hello.com.nl'
        );
        $this->assertNull(
            Canonicalizer::canonicalizeEmail('HelLo.World')
        );
    }

    public function testMacro(): void
    {
        Canonicalizer::macro('replaceSpaces', function (string $string) {
            return str_replace(' ', '', $string);
        });
        $this->assertSame(
            Canonicalizer::replaceSpaces('Hello World!'),
            'HelloWorld!'
        );
    }
}
