<?php
/*
** Zabbix
** Copyright (C) 2001-2023 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/

require_once dirname(__FILE__).'/../include/CLegacyWebTest.php';

class testPageWeb extends CLegacyWebTest {
	public function testPageWeb_CheckLayout() {
		$this->zbxTestLogin('zabbix.php?action=web.view');
		$this->zbxTestCheckTitle('Web monitoring');
		$this->zbxTestCheckHeader('Web monitoring');
		$this->zbxTestTextPresent(['Group', 'Host']);
		$this->zbxTestTextPresent(['Host', 'Name', 'Number of steps', 'Last check', 'Status']);
	}

// Check that no real host or template names displayed
	public function testPageWeb_NoHostNames() {
		$this->zbxTestLogin('zabbix.php?action=web.view');
		$this->zbxTestCheckTitle('Web monitoring');
		$this->zbxTestCheckNoRealHostnames();
	}
}
