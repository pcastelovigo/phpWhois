<?php
/**
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 * @license
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * @copyright Copyright (c) 2020 Joshua Smith
 */

namespace Tests\Handlers;

use phpWhois\Handlers\TodayHandler;

/**
 * TodayHandlerTest
 */
class TodayHandlerTest extends AbstractHandler
{
    /**
     * @var TodayHandler $handler
     */
    protected $handler;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->handler            = new TodayHandler();
        $this->handler->deepWhois = false;
    }

    /**
     * @return void
     *
     * @test
     */
    public function parseModxDotToday()
    {
        $query = 'modx.today';

        $fixture = $this->loadFixture($query);
        $data    = [
            'rawdata'  => $fixture,
            'regyinfo' => [],
        ];

        $actual = $this->handler->parse($data, $query);

        $this->assertEquals('modx.today', $actual['regrinfo']['domain']['name']);
        $this->assertEquals('2022-06-23', $actual['regrinfo']['domain']['changed']);
        $this->assertEquals('2014-05-09', $actual['regrinfo']['domain']['created']);
        $this->assertEquals('2023-05-09', $actual['regrinfo']['domain']['expires']);
        $this->assertEquals('yes', $actual['regrinfo']['registered']);

        $this->assertArrayHasKey('rawdata', $actual);
        $this->assertEquals($fixture, $actual['rawdata'], 'Fixture data may be out of date');
    }
}
