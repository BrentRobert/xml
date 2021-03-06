<?php

declare(strict_types=1);

namespace VeeWee\Xml\Tests\Dom\Loader;

use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Exception\RuntimeException;
use function VeeWee\Xml\Dom\Loader\xml_string_loader;

class XmlStringLoaderTest extends TestCase
{
    /** @test */
    public function it_can_load_xml_string(): void
    {
        $doc = new \DOMDocument();
        $xml = '<hello />';
        $loader = xml_string_loader($xml);

        $result = $loader($doc);
        self::assertTrue($result->getResult());
        self::assertXmlStringEqualsXmlString($xml, $doc->saveXML());
    }

    /** @test */
    public function it_can_not_load_invalid_xml_string(): void
    {
        $doc = new \DOMDocument();
        $xml = '<hello';
        $loader = xml_string_loader($xml);

        $result = $loader($doc);

        $this->expectException(RuntimeException::class);
        $this->expectErrorMessage('Could not load the DOM Document');
        $result->getResult();
    }
}
