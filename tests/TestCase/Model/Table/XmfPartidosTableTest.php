<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPartidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPartidosTable Test Case
 */
class XmfPartidosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPartidosTable
     */
    public $XmfPartidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('XmfPartidos') ? [] : ['className' => XmfPartidosTable::class];
        $this->XmfPartidos = TableRegistry::get('XmfPartidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPartidos);

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
