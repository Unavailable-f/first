<?php
namespace Bitrix\Forum;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class ForumSiteTable
 *
 * Fields:
 * <ul>
 * <li> FORUM_ID int mandatory
 * <li> SITE_ID char(2) mandatory
 * <li> PATH2FORUM_MESSAGE string(250)
 * <li> FORUM reference to {@link \Bitrix\Forum\ForumTable}
 * <li> SITE reference to {@link \Bitrix\Main\SiteTable}
 * </ul>
 *
 * @package Bitrix\Forum
 */
class ForumSiteTable extends \Bitrix\Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'b_forum2site';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'FORUM_ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'title' => Loc::getMessage('FORUM_SITE_TABLE_FIELD_FORUM_ID'),
			),
			'SITE_ID' => array(
				'data_type' => 'string',
				'primary' => true,
				'size' => 2,
				'title' => Loc::getMessage('FORUM_SITE_TABLE_FIELD_SITE_ID'),
			),
			'PATH2FORUM_MESSAGE' =>  array(
				'data_type' => 'string',
				'title' => Loc::getMessage('FORUM_SITE_TABLE_FIELD_SITE_ID'),
			),
			'FORUM' => array(
				'data_type' => 'Bitrix\Forum\Forum',
				'reference' => array('=this.FORUM_ID' => 'ref.ID')
			),
			'SITE' => array(
				'data_type' => 'Bitrix\Main\Site',
				'reference' => array('=this.SITE_ID' => 'ref.LID'),
			),
		);
	}
}
