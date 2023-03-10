<?php declare(strict_types = 0);

namespace Modules\Example_A;

use Zabbix\Core\CModule,
	APP,
	CMenu;

class Module extends CModule {

	/**
	 * Initialize module.
	 */
	public function init(): void {
		$menu = APP::Component()->get('menu.main');

		$menu
			->find('Monitoring')
			->getSubMenu()
			->add(
				(new \CMenuItem('4th Module'))->setAction('forth.module')
			);
	}
}
