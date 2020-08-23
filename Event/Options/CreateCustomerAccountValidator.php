<?php
/**
 * @author MageHook <info@magehook.com>
 * @package MageHook_HookEventsCustomer
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MageHook\HookEventsCustomer\Event\Options;

use MageHook\Hook\Event\Options\AbstractValidator;
use Magento\Customer\Api\Data\CustomerInterface;

/**
 * Class CreateCustomerAccountValidator
 *
 * @package MageHook\HookEventsCustomer\Event\Options
 */
class CreateCustomerAccountValidator extends AbstractValidator
{
    /**
     * @inheritdoc
     */
    public function validate(): bool
    {
        /** @var CustomerInterface $customer */
        $customer = $this->getResource();

        if ($this->hasCustomerGroups()) {
            /** @var array $groups */
            $groups = $this->getCustomerGroups();

            return \in_array($customer->getGroupId(), $groups, true);
        }

        return true;
    }

    /**
     * Get optional customer group options.
     *
     * @return array
     */
    public function getCustomerGroups(): array
    {
        $customerGroups = $this->getOptions()->getCustomerGroups();
        return empty($customerGroups) ? [] : $customerGroups;
    }

    /**
     * @return bool
     */
    public function hasCustomerGroups(): bool
    {
        return !empty($this->getCustomerGroups());
    }
}
