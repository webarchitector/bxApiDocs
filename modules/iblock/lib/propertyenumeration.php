<?php
namespace Bitrix\Iblock;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class PropertyEnumerationTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> PROPERTY_ID int mandatory
 * <li> VALUE string(255) mandatory
 * <li> DEF bool optional default 'N'
 * <li> SORT int optional default 500
 * <li> XML_ID string(200) mandatory
 * <li> TMP_ID string(40) optional
 * <li> PROPERTY reference to {@link \Bitrix\Iblock\PropertyTable}
 * </ul>
 *
 * @package Bitrix\Iblock
 **/

class PropertyEnumerationTable extends Entity\DataManager
{
	/**
	 * Returns path to the file which contains definition of the class.
	 *
	 * @return string
	 */
	
	/**
	* <p>Метод возвращает путь к файлу, содержащему определение класса. Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return string 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/getfilepath.php
	* @author Bitrix
	*/
	public static function getFilePath()
	{
		return __FILE__;
	}

	/**
	 * Returns DB table name for entity
	 *
	 * @return string
	 */
	
	/**
	* <p>Метод возвращает название таблицы вариантов значений свойств типа <b>Список</b>. Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return string 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/gettablename.php
	* @author Bitrix
	*/
	public static function getTableName()
	{
		return 'b_iblock_property_enum';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	
	/**
	* <p>Метод возвращает список полей для таблицы вариантов значений свойств типа <b>Список</b>. Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/getmap.php
	* @author Bitrix
	*/
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_ID_FIELD'),
			),
			'PROPERTY_ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_PROPERTY_ID_FIELD'),
			),
			'VALUE' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateValue'),
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_VALUE_FIELD'),
			),
			'DEF' => array(
				'data_type' => 'boolean',
				'values' => array('N', 'Y'),
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_DEF_FIELD'),
			),
			'SORT' => array(
				'data_type' => 'integer',
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_SORT_FIELD'),
			),
			'XML_ID' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validateXmlId'),
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_XML_ID_FIELD'),
			),
			'TMP_ID' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validateTmpId'),
				'title' => Loc::getMessage('IBLOCK_PROPERTY_ENUM_ENTITY_TMP_ID_FIELD'),
			),
			'PROPERTY' => array(
				'data_type' => 'Bitrix\Iblock\Property',
				'reference' => array('=this.PROPERTY_ID' => 'ref.ID'),
			),
		);
	}

	/**
	 * Returns validators for VALUE field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Метод возвращает валидатор для поля <code>VALUE</code> (значение варианта свойства). Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/validatevalue.php
	* @author Bitrix
	*/
	public static function validateValue()
	{
		return array(
			new Entity\Validator\Length(null, 255),
		);
	}

	/**
	 * Returns validators for XML_ID field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Метод возвращает валидатор для поля <code>XML_ID </code> (внешний код варианта свойства). Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/validatexmlid.php
	* @author Bitrix
	*/
	public static function validateXmlId()
	{
		return array(
			new Entity\Validator\Unique(),
			new Entity\Validator\Length(null, 200),
		);
	}

	/**
	 * Returns validators for TMP_ID field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Метод возвращает валидатор для поля <code>TMP_ID</code> (временный символьный идентификатор, используемый для служебных целей). Метод статический.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/iblock/propertyenumerationtable/validatetmpid.php
	* @author Bitrix
	*/
	public static function validateTmpId()
	{
		return array(
			new Entity\Validator\Length(null, 40),
		);
	}
}
