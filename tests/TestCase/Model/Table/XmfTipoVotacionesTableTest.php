<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfTipoVotacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfTipoVotacionesTable Test Case
 */
class XmfTipoVotacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfTipoVotacionesTable
     */
    public $XmfTipoVotaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_tipo_votaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfTipoVotaciones') ? [] : ['className' => XmfTipoVotacionesTable::class];
        $this->XmfTipoVotaciones = TableRegistry::get('XmfTipoVotaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfTipoVotaciones);

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
