<?php
/**
 * @author MageHook <info@magehook.com>
 * @package MageHook_HookEventsCustomer
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'MageHook_HookEventsCustomer',
    __DIR__
);
