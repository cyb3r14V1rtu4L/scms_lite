<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReportsConfigDefinitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReportsConfigDefinitionsTable Test Case
 */
class XmfReportsConfigDefinitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReportsConfigDefinitionsTable
     */
    public $XmfReportsConfigDefinitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_reports_config_definitions',
        'app.xmf_reports_definitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfReportsConfigDefinitions') ? [] : ['className' => XmfReportsConfigDefinitionsTable::class];
        $this->XmfReportsConfigDefinitions = TableRegistry::get('XmfReportsConfigDefinitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReportsConfigDefinitions);

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
