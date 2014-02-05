<?php

namespace Fuel\Migrations;

class Create_tpcapacitacions
{
	public function up()
	{
		\DBUtil::create_table('tpcapacitacions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nom_capa' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tpcapacitacions');
	}
}