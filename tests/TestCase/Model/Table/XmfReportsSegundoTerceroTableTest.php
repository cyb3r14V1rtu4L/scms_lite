<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfReportsSegundoTerceroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfReportsSegundoTerceroTable Test Case
 */
class XmfReportsSegundoTerceroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfReportsSegundoTerceroTable
     */
    public $XmfReportsSegundoTercero;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_reports_segundo_tercero'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfReportsSegundoTercero') ? [] : ['className' => XmfReportsSegundoTerceroTable::class];
        $this->XmfReportsSegundoTercero = TableRegistry::get('XmfReportsSegundoTercero', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfReportsSegundoTercero);

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
