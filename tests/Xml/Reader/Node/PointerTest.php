<?php

declare(strict_types=1);

namespace VeeWee\Xml\Tests\Reader\Node;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Reader\Node\ElementNode;
use VeeWee\Xml\Reader\Node\NodeSequence;
use VeeWee\Xml\Reader\Node\Pointer;

class PointerTest extends TestCase
{
    /** @test */
    public function it_is_empty_at_the_start(): void
    {
        $pointer = Pointer::create();

        self::assertSame(0, $pointer->getCurrentSiblingPosition());
        self::assertSame(0, $pointer->getDepth());
        self::assertEquals(new NodeSequence(), $pointer->getNodeSequence());
    }

    /** @test */
    public function it_cannot_leave_element_on_empty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Currently at root level. Can not leave element!');

        $pointer = Pointer::create();
        $pointer->leaveElement();
    }

    /** @test */
    public function it_knows_the_position_on_enter(): void
    {
        $pointer = Pointer::create();

        $pointer->enterElement($element1 = new ElementNode(1, 'item', 'item', '', '', []));
        self::assertSame(1, $pointer->getCurrentSiblingPosition());
        self::assertSame(1, $pointer->getDepth());
        self::assertEquals(new NodeSequence($element1), $pointer->getNodeSequence());

        $pointer->enterElement($element2 = new ElementNode(1, 'item', 'item', '', '', []));
        self::assertSame(1, $pointer->getCurrentSiblingPosition());
        self::assertSame(2, $pointer->getDepth());
        self::assertEquals(new NodeSequence($element1, $element2), $pointer->getNodeSequence());
        $pointer->leaveElement();

        $pointer->enterElement($element3 = new ElementNode(1, 'item', 'item', '', '', []));
        self::assertSame(2, $pointer->getCurrentSiblingPosition());
        self::assertSame(2, $pointer->getDepth());
        self::assertEquals(new NodeSequence($element1, $element3), $pointer->getNodeSequence());
        $pointer->leaveElement();

        $pointer->leaveElement();
        self::assertSame(0, $pointer->getCurrentSiblingPosition());
        self::assertSame(0, $pointer->getDepth());
        self::assertEquals(new NodeSequence(), $pointer->getNodeSequence());
    }
}
