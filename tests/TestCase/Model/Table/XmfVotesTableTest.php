<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfVotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfVotesTable Test Case
 */
class XmfVotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfVotesTable
     */
    public $XmfVotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_votes',
        'app.xmf_casillas',
        'app.xmf_tipo_votaciones',
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
        $config = TableRegistry::exists('XmfVotes') ? [] : ['className' => XmfVotesTable::class];
        $this->XmfVotes = TableRegistry::get('XmfVotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfVotes);

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
