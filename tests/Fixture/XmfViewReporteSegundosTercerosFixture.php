<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * XmfViewReporteSegundosTercerosFixture
 *
 */
class XmfViewReporteSegundosTercerosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'xmf_casillas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'votantes_segundo' => ['type' => 'decimal', 'length' => 32, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'promovidos_segundo' => ['type' => 'decimal', 'length' => 32, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'votantes_tercero' => ['type' => 'decimal', 'length' => 32, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'promovidos_tercero' => ['type' => 'decimal', 'length' => 32, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_options' => [
            'engine' => null,
            'collation' => null
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'xmf_casillas_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'votantes_segundo' => 1.5,
            'promovidos_segundo' => 1.5,
            'votantes_tercero' => 1.5,
            'promovidos_tercero' => 1.5
        ],
    ];
}
