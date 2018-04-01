<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfValidationsLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfValidationsLogsTable Test Case
 */
class XmfValidationsLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfValidationsLogsTable
     */
    public $XmfValidationsLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_validations_logs',
        'app.xmf_reports',
        'app.xmf_validations',
        'app.reports',
        'app.xmf_validations_configs',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfValidationsLogs') ? [] : ['className' => XmfValidationsLogsTable::class];
        $this->XmfValidationsLogs = TableRegistry::get('XmfValidationsLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfValidationsLogs);

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
