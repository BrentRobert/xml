<?php

namespace VeeWee\Xml\Tests\Dom\Xpath\Locator;

use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Dom\Document;
use VeeWee\Xml\Exception\RuntimeException;
use function VeeWee\Xml\Dom\Locator\elements_with_tagname;

class QueryTest extends TestCase
{
    /** @test */
    public function it_can_handle_xpath_errors(): void
    {
        $xpath = $this->provideXml()->xpath();

        $this->expectException(RuntimeException::class);
        $this->expectErrorMessage('Failed querying XPath query');
        $this->expectErrorMessage('[ERROR] : Invalid expression');

        $xpath->query('$p$m``m$^^$^^jibberish');
    }

    /** @test */
    public function it_can_find_xpath_elements(): void
    {
        $xpath = $this->provideXml()->xpath();
        $res = $xpath->query('//item');

        self::assertCount(2, $res);
    }

    /** @test */
    public function it_can_find_xpath_elements_with_node_context(): void
    {
        $doc = $this->provideXml();
        $hello = $doc->locate(elements_with_tagname('hello'))->item(0);

        $xpath = $doc->xpath();
        $res = $xpath->query('./world', $hello);

        self::assertCount(1, $res);
    }

    private function provideXml(): Document
    {
        return Document::fromXmlString(<<<EOXML
            <root>
                <item>Hello</item>
                <item>World</item>
                <hello>
                    <world />
                </hello>
            </root>
        EOXML);
    }
}
