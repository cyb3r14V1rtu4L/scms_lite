<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfBoxesOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfBoxesOrdersTable Test Case
 */
class XmfBoxesOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfBoxesOrdersTable
     */
    public $XmfBoxesOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_boxes_orders',
        'app.xmf_tipo_votaciones',
        'app.xmf_boxes_blocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfBoxesOrders') ? [] : ['className' => XmfBoxesOrdersTable::class];
        $this->XmfBoxesOrders = TableRegistry::get('XmfBoxesOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfBoxesOrders);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
