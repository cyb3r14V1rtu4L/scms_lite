<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReportsControlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReportsControlsTable Test Case
 */
class XmfReportsControlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReportsControlsTable
     */
    public $XmfReportsControls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_reports_controls',
        'app.xmf_reports',
        'app.xmf_users',
        'app.xmf_roles',
        'app.xmf_validations',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfReportsControls') ? [] : ['className' => XmfReportsControlsTable::class];
        $this->XmfReportsControls = TableRegistry::get('XmfReportsControls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReportsControls);

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
