<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

namespace PrestaShop\Module\PrestashopCheckout\Updater;

use PrestaShop\Module\PrestashopCheckout\Entity\PaypalAccount;
use PrestaShop\Module\PrestashopCheckout\Api\Payment\Shop;
use PrestaShop\Module\PrestashopCheckout\PersistentConfiguration;

/**
 * Check and set the merchant status
 */
class PaypalAccountUpdater
{
    const SUBSCRIBED = 'SUBSCRIBED';
    const NEED_MORE_DATA = 'NEED_MORE_DATA';
    const IN_REVIEW = 'IN_REVIEW';
    const DENIED = 'DENIED';
    const LIMITED = 'LIMITED';

    /* Paypal requires Merchant ID to be 13-characters long at least */
    const MIN_ID_LENGTH = 13;

    /**
     * @var PaypalAccount
     */
    private $account;

    public function __construct(PaypalAccount $account)
    {
        $merchantId = $account->getMerchantId();

        if (empty($merchantId)) {
            throw new \PrestaShopException('MerchantId cannot be empty');
        }

        $this->setAccount($account);
    }

    /**
     * Update the merchant
     */
    public function update()
    {
        $response = $this->getMerchantIntegration();

        if (false === $response) {
            return false;
        }

        $this->account->setEmail($response['primary_email']);
        $this->account->setEmailIsVerified($response['primary_email_confirmed']);
        $this->account->setPaypalPaymentStatus($response['payments_receivable']);
        $this->account->setCardPaymentStatus($this->getCardStatus($response));

        return (new PersistentConfiguration())->savePaypalAccount($this->account);
    }

    /**
     * Determine the status for hosted fields
     *
     * @param array $response
     *
     * @return string $status status to set in database
     */
    private function getCardStatus($response)
    {
        // PPCP_CUSTOM = product pay by card (hosted fields)
        $cardProductIndex = array_search('PPCP_CUSTOM', array_column($response['products'], 'name'));

        // if product 'PPCP_CUSTOM' doesn't exist disable directly hosted fields
        if (false === $cardProductIndex) {
            return self::DENIED;
        }

        $cardProduct = $response['products'][$cardProductIndex];

        switch ($cardProduct['vetting_status']) {
            case self::SUBSCRIBED:
                $status = $this->cardIsLimited($response);
                break;
            case self::NEED_MORE_DATA:
                $status = self::NEED_MORE_DATA;
                break;
            case self::DENIED:
                $status = self::DENIED;
                break;
            case self::IN_REVIEW:
                $status = self::IN_REVIEW;
                break;
            default:
                $status = self::DENIED;
                break;
        }

        return $status;
    }

    /**
     * Check if the card is limited in the case where the card is in SUBSCRIBED
     *
     * @param array $response
     *
     * @return string $status
     */
    private function cardIsLimited($response)
    {
        $findCapability = array_search('CUSTOM_CARD_PROCESSING', array_column($response['capabilities'], 'name'));
        $capability = $response['capabilities'][$findCapability];

        if (isset($capability['limits'])) {
            return self::LIMITED;
        }

        return self::SUBSCRIBED;
    }

    /**
     * Get the merchant integration
     *
     * @return array|bool response or false
     */
    private function getMerchantIntegration()
    {
        $merchantIntegration = (new Shop(\Context::getContext()->link))->getMerchantIntegration($this->account->getMerchantId());

        if (false === $merchantIntegration
            || !isset($merchantIntegration['merchant_integrations'])
        ) {
            return false;
        }

        return $merchantIntegration['merchant_integrations'];
    }

    /**
     * Setter for account
     *
     * @param PaypalAccount $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Getter for account
     *
     * @return PaypalAccount
     */
    public function getAccount()
    {
        return $this->account;
    }
}
