<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPrimerReporteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPrimerReporteTable Test Case
 */
class XmfPrimerReporteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPrimerReporteTable
     */
    public $XmfPrimerReporte;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_primer_reporte',
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
        $config = TableRegistry::exists('XmfPrimerReporte') ? [] : ['className' => XmfPrimerReporteTable::class];
        $this->XmfPrimerReporte = TableRegistry::get('XmfPrimerReporte', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPrimerReporte);

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
