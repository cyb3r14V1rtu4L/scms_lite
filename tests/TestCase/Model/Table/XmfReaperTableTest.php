<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReaperTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReaperTable Test Case
 */
class XmfReaperTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReaperTable
     */
    public $XmfReaper;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_reaper',
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
        $config = TableRegistry::exists('XmfReaper') ? [] : ['className' => XmfReaperTable::class];
        $this->XmfReaper = TableRegistry::get('XmfReaper', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReaper);

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
