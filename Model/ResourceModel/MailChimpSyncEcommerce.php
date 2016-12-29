<?php
/**
 * mc-magento2 Magento Component
 *
 * @category Ebizmarts
 * @package mc-magento2
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 12/1/16 2:33 PM
 * @file: MailChimpSyncEcommerce.php
 */

namespace Ebizmarts\MailChimp\Model\ResourceModel;

use Magento\Framework\DB\Select;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class MailChimpSyncEcommerce extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mailchimp_sync_ecommerce', 'id');
    }
    public function getByStoreIdType(\Ebizmarts\MailChimp\Model\MailChimpSyncEcommerce $chimp, $storeId, $id, $type)
    {
        $connection = $this->getConnection();
        $bind = ['store_id' => $storeId, 'type' => $type, 'related_id' => $id];
        $select = $connection->select()->from(
            $this->getTable('mailchimp_sync_ecommerce')
        )->where(
            'store_id = :store_id AND type = :type AND related_id = :related_id'
        );
        $data = $connection->fetchRow($select, $bind);
        if ($data) {
            $chimp->setData($data);
        }
        return $this;
    }
}