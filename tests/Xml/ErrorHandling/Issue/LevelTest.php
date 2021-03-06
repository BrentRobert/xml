<?php

declare(strict_types=1);

namespace VeeWee\Xml\Tests\Issue;

use PHPUnit\Framework\TestCase;
use VeeWee\Xml\Tests\ErrorHandling\Issue\UseIssueTrait;
use VeeWee\Xml\ErrorHandling\Issue\Level;

class LevelTest extends TestCase
{
    use UseIssueTrait;

    public function testItCanBeError()
    {
        $level = Level::error();

        static::assertTrue($level->matches(Level::error()));
        static::assertTrue($level->isError());
        static::assertSame(LIBXML_ERR_ERROR, $level->value());
        static::assertSame('error', $level->toString());

        static::assertFalse($level->isFatal());
        static::assertFalse($level->isWarning());
    }

    public function testItCanBeFatal()
    {
        $level = Level::fatal();

        static::assertTrue($level->matches(Level::fatal()));
        static::assertTrue($level->isFatal());
        static::assertSame(LIBXML_ERR_FATAL, $level->value());
        static::assertSame('fatal', $level->toString());

        static::assertFalse($level->isError());
        static::assertFalse($level->isWarning());
    }

    public function testItCanBeWarning()
    {
        $level = Level::warning();

        static::assertTrue($level->matches(Level::warning()));
        static::assertTrue($level->isWarning());
        static::assertSame(LIBXML_ERR_WARNING, $level->value());
        static::assertSame('warning', $level->toString());

        static::assertFalse($level->isError());
        static::assertFalse($level->isFatal());
    }
}
