<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPrimerReporteTabTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPrimerReporteTabTable Test Case
 */
class XmfPrimerReporteTabTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPrimerReporteTabTable
     */
    public $XmfPrimerReporteTab;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_primer_reporte_tab',
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
        $config = TableRegistry::exists('XmfPrimerReporteTab') ? [] : ['className' => XmfPrimerReporteTabTable::class];
        $this->XmfPrimerReporteTab = TableRegistry::get('XmfPrimerReporteTab', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPrimerReporteTab);

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
