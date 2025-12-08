<?php

/**
 * @license   See LICENSE file
 * @copyright Copyright (C)1999,2005 easyDNS Technologies Inc. & Mark Jeftovic
 * @copyright Maintained by David Saez
 * @copyright Copyright (c) 2014 Dmitry Lukashin
 * @copyright Copyright (c) 2023 Kevin Lucich
 */

namespace phpWhois\Handlers\gTLD;

use phpWhois\Handlers\AbstractHandler;

class AfternicHandler extends AbstractHandler
{
    public function parse(array $data_str, string $query): array
    {
        $items = [
            'owner' => 'Registrant:',
            'admin' => 'Administrative Contact',
            'tech' => 'Technical Contact',
            'zone' => 'Zone Contact',
            'domain.name' => 'Domain Name:',
            'domain.changed' => 'Updated Date:',
            'domain.created' => 'Creation Date:',
            'domain.expires' => 'Registry Expiry Date:',
            'name_server' => 'Name Server:',
        ];

        return static::easyParser($data_str['rawdata'], $items, 'dmy', [], false, true);
    }
}
