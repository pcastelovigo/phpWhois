<?php

namespace Handlers\IP;

use PHPUnit\Framework\TestCase;
use phpWhois\Whois;

/**
 * User: dreamlex
 * User: Kevin Lucich.
 *
 * @internal
 * @coversNothing
 */
class IpHandlerTest extends TestCase
{
    /**
     * @dataProvider ipsList
     * @param mixed $ip
     */
    public function testParseIp($ip)
    {
        $ipHandler = new Whois();
        $result = $ipHandler->lookup($ip);

        static::assertTrue(is_array($result));
    }

    public static function ipsList(): array
    {
        return [
            ['216.58.209.195'],
            ['45.225.3.34'],
        ];
    }
}
