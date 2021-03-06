<?php

/**
 * This is the model class for table "email_format".
 *
 * The followings are the available columns in table 'email_format':
 * @property string $email_id
 * @property string $email_template
 * @property string $email_title
 * @property string $email_text
 */
class EmailFormat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmailFormat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'email_format';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_template', 'required'),
			array('email_template, email_title', 'length', 'max'=>100),
			array('email_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('email_id, email_template, email_title, email_text', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email_id' => 'Template',
			'email_template' => 'Template Name',
			'email_title' => 'Subject',
			'email_text' => 'Content',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('email_id',$this->email_id);
		$criteria->compare('email_template',$this->email_template,true);
		$criteria->compare('email_title',$this->email_title,true);
		$criteria->compare('email_text',$this->email_text,true);
		$criteria->order='email_template ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}