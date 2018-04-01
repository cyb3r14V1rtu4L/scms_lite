<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReportsDefinitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReportsDefinitionsTable Test Case
 */
class XmfReportsDefinitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReportsDefinitionsTable
     */
    public $XmfReportsDefinitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('XmfReportsDefinitions') ? [] : ['className' => XmfReportsDefinitionsTable::class];
        $this->XmfReportsDefinitions = TableRegistry::get('XmfReportsDefinitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReportsDefinitions);

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
}
