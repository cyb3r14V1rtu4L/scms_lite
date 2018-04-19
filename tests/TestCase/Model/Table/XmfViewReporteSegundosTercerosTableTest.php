<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfViewReporteSegundosTercerosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfViewReporteSegundosTercerosTable Test Case
 */
class XmfViewReporteSegundosTercerosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfViewReporteSegundosTercerosTable
     */
    public $XmfViewReporteSegundosTerceros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_view_reporte_segundos_terceros',
        'app.xmf_casillas',
        'app.users',
        'app.roles',
        'app.social_accounts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfViewReporteSegundosTerceros') ? [] : ['className' => XmfViewReporteSegundosTercerosTable::class];
        $this->XmfViewReporteSegundosTerceros = TableRegistry::get('XmfViewReporteSegundosTerceros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfViewReporteSegundosTerceros);

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
