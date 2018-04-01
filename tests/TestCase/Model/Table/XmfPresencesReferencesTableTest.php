<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPresencesReferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPresencesReferencesTable Test Case
 */
class XmfPresencesReferencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPresencesReferencesTable
     */
    public $XmfPresencesReferences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('XmfPresencesReferences') ? [] : ['className' => XmfPresencesReferencesTable::class];
        $this->XmfPresencesReferences = TableRegistry::get('XmfPresencesReferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPresencesReferences);

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
