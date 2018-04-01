<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfViewIncidenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfViewIncidenciasTable Test Case
 */
class XmfViewIncidenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfViewIncidenciasTable
     */
    public $XmfViewIncidencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_view_incidencias',
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
        $config = TableRegistry::exists('XmfViewIncidencias') ? [] : ['className' => XmfViewIncidenciasTable::class];
        $this->XmfViewIncidencias = TableRegistry::get('XmfViewIncidencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfViewIncidencias);

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
