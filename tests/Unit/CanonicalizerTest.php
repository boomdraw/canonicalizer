<?php

namespace Boomdraw\Canonicalizer\Tests\Unit;

use Boomdraw\Canonicalizer\Tests\TestCase;
use Canonicalizer;
use Illuminate\Support\Str;

class CanonicalizerTest extends TestCase
{
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

    public function testSlugCanonicalization(): void
    {
        $this->assertSame(Canonicalizer::canonicalizeSlug('hello world'), Str::slug('hello world'));
        $this->assertSame(Canonicalizer::canonicalizeSlug('hello-world'), Str::slug('hello-world'));
        $this->assertSame(Canonicalizer::canonicalizeSlug('hello_world'), Str::slug('hello_world'));
        $this->assertSame(Canonicalizer::canonicalizeSlug('hello_world', '_'), Str::slug('hello_world', '_'));
        $this->assertSame(Canonicalizer::canonicalizeSlug('user@host'), Str::slug('user@host'));
    }

    public function testUriCanonicalization(): void
    {
        $this->assertSame(
            'hello-my-baby/hello-my-darling/lalala',
            Canonicalizer::canonicalizeUrl('/Hello my baby!/hello_my_darling/lal&^#$ala/')
        );
        $this->assertSame(
            'hello_my_baby/hello_my_darling/lalala',
            Canonicalizer::canonicalizeUrl('/Hello my baby!/hello_my_darling/lal&^#$ala/', '_')
        );
    }

    public function testUrlCanonicalization(): void
    {
        $this->assertSame(
            Canonicalizer::canonicalizeUrl('/Hello my baby!/hello_my_darling/lal&^#$ala/'),
            Canonicalizer::canonicalizeUri('/Hello my baby!/hello_my_darling/lal&^#$ala/')
        );
        $this->assertSame(
            Canonicalizer::canonicalizeUrl('/Hello my baby!/hello_my_darling/lal&^#$ala/', '_'),
            Canonicalizer::canonicalizeUri('/Hello my baby!/hello_my_darling/lal&^#$ala/', '_')
        );
    }
}
