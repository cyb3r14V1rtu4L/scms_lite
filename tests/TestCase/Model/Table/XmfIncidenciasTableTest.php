<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfIncidenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfIncidenciasTable Test Case
 */
class XmfIncidenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfIncidenciasTable
     */
    public $XmfIncidencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('XmfIncidencias') ? [] : ['className' => XmfIncidenciasTable::class];
        $this->XmfIncidencias = TableRegistry::get('XmfIncidencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfIncidencias);

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
