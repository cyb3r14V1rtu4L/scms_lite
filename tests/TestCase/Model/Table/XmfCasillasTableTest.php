<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfCasillasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfCasillasTable Test Case
 */
class XmfCasillasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfCasillasTable
     */
    public $XmfCasillas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_casillas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfCasillas') ? [] : ['className' => XmfCasillasTable::class];
        $this->XmfCasillas = TableRegistry::get('XmfCasillas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfCasillas);

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
