<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $hashed_password
 * @property string $description
 * @property string $consultation
 * @property integer $is_admin
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property El[] $els
 * @property News[] $news
 * @property Page[] $pages
 * @property Course[] $courses
 * @property Sport[] $sports
 */
class User extends CActiveRecord
{
	/**
	 * @property password
	 */
	public $password;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('email', 'unique'),
			array('is_admin', 'numerical', 'integerOnly'=>true),
			array('name, email, password', 'length', 'max'=>255),
			array('description, consultation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, description, consultation, is_admin, updated_at', 'safe', 'on'=>'search'),
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
			'els' => array(self::MANY_MANY, 'El', 'tbl_user_el(user_id, el_id)'),
			'news' => array(self::HAS_MANY, 'News', 'user_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'user_id'),
			'courses' => array(self::MANY_MANY, 'Course', 'tbl_user_course(user_id, course_id)'),
			'sports' => array(self::MANY_MANY, 'Sport', 'tbl_user_sport(user_id, sport_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Meno',
			'email' => 'Email',
			'password' => 'Heslo',
			'description' => 'Popis',
			'consultation' => 'Konzultácie',
			'is_admin' => 'Administrátor',
			'updated_at' => 'Čas úpravy',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('consultation',$this->consultation,true);
		$criteria->compare('is_admin',$this->is_admin);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Validates a password against a hash.
	 * 
	 * @param string $password The password to validate. If password is empty or not a string, method will return false.
	 * @return boolean True if the password matches the hash.
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->hashed_password);
	}
	
	/**
	 * Generate a secure hash from a password and a random salt.
	 * 
	 * @param string $password
	 * @return string hashed password
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
	
	/**
	 * Returns a list of behaviors that this model should behave as.
	 * The return value should be an array of behavior configurations indexed by
	 * behavior names. Each behavior configuration can be either a string specifying
	 * the behavior class or an array of the following structure:
	 * <pre>
	 * 'behaviorName'=>array(
	 *     'class'=>'path.to.BehaviorClass',
	 *     'property1'=>'value1',
	 *     'property2'=>'value2',
	 * )
	 * </pre>
	 *
	 * Note, the behavior classes must implement {@link IBehavior} or extend from
	 * {@link CBehavior}. Behaviors declared in this method will be attached
	 * to the model when it is instantiated.
	 *
	 * For more details about behaviors, see {@link CComponent}.
	 * @return array the behavior configurations (behavior name=>behavior configuration)
	 */
	public function behaviors()
	{
		return array(
			'activerecord-relation'=>array(
				'class'=>'ext.yiiext.behaviors.activerecord-relation.EActiveRecordRelationBehavior',
			),
		);
	}
	
	/**
	 * Override beforeSave() to hash password
	 * @see CActiveRecord::beforeSave()
	 */
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if (!empty($this->password)) {
				$this->hashed_password = $this->hashPassword($this->password);
			}
			return true;
		} else {
			return false;
		}
	}
}
