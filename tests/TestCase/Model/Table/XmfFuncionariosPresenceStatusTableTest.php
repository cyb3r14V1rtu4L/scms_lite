<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfFuncionariosPresenceStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfFuncionariosPresenceStatusTable Test Case
 */
class XmfFuncionariosPresenceStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfFuncionariosPresenceStatusTable
     */
    public $XmfFuncionariosPresenceStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_funcionarios_presence_status',
        'app.xmf_presences_references',
        'app.xmf_casillas',
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
        $config = TableRegistry::exists('XmfFuncionariosPresenceStatus') ? [] : ['className' => XmfFuncionariosPresenceStatusTable::class];
        $this->XmfFuncionariosPresenceStatus = TableRegistry::get('XmfFuncionariosPresenceStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfFuncionariosPresenceStatus);

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
