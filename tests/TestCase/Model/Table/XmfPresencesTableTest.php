<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmfPresencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmfPresencesTable Test Case
 */
class XmfPresencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\XmfPresencesTable
     */
    public $XmfPresences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.xmf_presences'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('XmfPresences') ? [] : ['className' => XmfPresencesTable::class];
        $this->XmfPresences = TableRegistry::get('XmfPresences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->XmfPresences);

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
