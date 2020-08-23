<?php
/**
 * @author MageHook <info@magehook.com>
 * @package MageHook_HookEventsSales
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MageHook\HookEventsCustomer\Plugin\Magento\Customer\Api;

use MageHook\Hook\ManagerInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\AccountManagementInterface as Subject;

/**
 * Class AccountManagementInterface
 *
 * @package MageHook\HookEventsCustomer\Plugin\Magento\Customer\Api
 */
class AccountManagementInterface
{
    /** @var ManagerInterface $hookEventsManagerInterface */
    protected $hookEventsManagerInterface;

    /**
     * AccountManagementInterface constructor.
     *
     * @param ManagerInterface $hookEventsManagerInterface
     */
    public function __construct(
        ManagerInterface $hookEventsManagerInterface
    ) {
        $this->hookEventsManagerInterface = $hookEventsManagerInterface;
    }

    /**
     * @param Subject           $subject
     * @param CustomerInterface $customer
     *
     * @return CustomerInterface
     */
    public function afterCreateAccount(Subject $subject, CustomerInterface $customer): CustomerInterface
    {
        $this->hookEventsManagerInterface->fire('create_customer_account', $customer);
        return $customer;
    }
}
