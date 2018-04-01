<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPartidosIncidenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPartidosIncidenciasTable Test Case
 */
class XmfPartidosIncidenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPartidosIncidenciasTable
     */
    public $XmfPartidosIncidencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_partidos_incidencias',
        'app.xmf_casillas',
        'app.xmf_partidos',
        'app.xmf_incidencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfPartidosIncidencias') ? [] : ['className' => XmfPartidosIncidenciasTable::class];
        $this->XmfPartidosIncidencias = TableRegistry::get('XmfPartidosIncidencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPartidosIncidencias);

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
