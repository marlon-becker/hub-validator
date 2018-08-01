<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HubTest extends TestCase
{
    public function testCanBeCreatedFromValidHubStructure(): void
    {
        $this->assertInstanceOf(
            Hub::class,
            Hub::fromString("wb w")
        );
    }

    public function testCheckValidHubStructures(): void
    {
        $this->assertEquals(
          "wb w",
          Hub::fromString("wb w")
        );

        $this->assertEquals(
          "wb bb w",
          Hub::fromString("wb bb w")
        );
    }

    public function testCheckInvalidHubStructureNoWalls(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Hub::fromString("b b");
    }

    public function testCheckInvalidHubStructureThreeBoxes(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Hub::fromString("w bbb w");
    }

    public function testCheckInvalidHubStructureWallBoxes(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Hub::fromString("wbb bb bbw");
    }

    public function testCannotBeCreatedFromInvalidHubStructure(): void
    {
        $this->expectException(TypeError::class);

        Hub::fromString(1);
    }
}
