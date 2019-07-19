<?php

namespace Acodez\Bannerslider\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements  UpgradeSchemaInterface

{

public function upgrade(SchemaSetupInterface $setup,

ModuleContextInterface $context){

$setup->startSetup();

if (version_compare($context->getVersion(), '2.0.0') < 0) {

// Get module table

$tableName = $setup->getTable('acodez_bannerslides');

// Check if the table already exists

    if ($setup->getConnection()->isTableExists($tableName) == true) {

// Declare data

   $columns = [
            'slider_category' => [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Banner Category',
            ],

    ];

    $connection = $setup->getConnection();
        foreach ($columns as $name => $definition) {
                $connection->addColumn($tableName, $name, $definition);
        }
    }
    $table1 = $setup->getConnection()->newTable(
            $setup->getTable('acodez_bannerslides_category')
        )
        ->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Category Id'
        )
        
        ->addColumn(
            'bannerslides_category_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Category Name'
        )
        ->addColumn(
            'bannerslides_category_description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Category Description'
        )
       
        
        ->addColumn(
            'bannerslides_category_created',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false],
            'journey_category_created'
        )
         ->addColumn('position',  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, ['nullable' => false, 'default' => '0'], 'Position')
        
        
        ->setComment(
            'Acodez Banner Category'
        );
        
        $setup->getConnection()->createTable($table1);

} 
$setup->endSetup();

}

}