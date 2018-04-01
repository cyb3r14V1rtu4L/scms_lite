<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfValidationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfValidationsTable Test Case
 */
class XmfValidationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfValidationsTable
     */
    public $XmfValidations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('XmfValidations') ? [] : ['className' => XmfValidationsTable::class];
        $this->XmfValidations = TableRegistry::get('XmfValidations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfValidations);

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
