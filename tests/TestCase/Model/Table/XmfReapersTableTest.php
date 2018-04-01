<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReapersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReapersTable Test Case
 */
class XmfReapersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReapersTable
     */
    public $XmfReapers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_reapers',
        'app.xmf_casillas',
        'app.xmf_tipo_votaciones',
        'app.xmf_partidos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfReapers') ? [] : ['className' => XmfReapersTable::class];
        $this->XmfReapers = TableRegistry::get('XmfReapers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReapers);

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
