<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $id
 * @property string $fio
 * @property integer $user_id
 * @property integer $department_id
 * @property string $img
 * @property string $post
 * @property string $type
 * @property string $birthday
 * @property string $birthplace
 * @property string $nationality
 * @property string $partiya
 * @property string $degree
 * @property string $ended
 * @property string $specialization
 * @property string $science_degree
 * @property string $science_title
 * @property string $foreign_langs
 * @property string $gov_awards
 * @property string $deputy
 *
 * @property Groups[] $groups
 * @property Subject[] $subjects
 * @property Subject[] $subjects0
 * @property Subject[] $subjects1
 * @property Subject[] $subjects2
 * @property User $user
 * @property Department $department
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fio', 'user_id', 'department_id', 'post', 'type'], 'required'],
            [['id', 'user_id', 'department_id'], 'integer'],
            [['fio', 'type', 'gov_awards'], 'string'],
            [['img'], 'string', 'max' => 255],
            [['post', 'partiya', 'specialization', 'science_degree', 'science_title', 'foreign_langs'], 'string', 'max' => 32],
            [['birthday', 'degree'], 'string', 'max' => 16],
            [['birthplace', 'ended', 'deputy'], 'string', 'max' => 64],
            [['nationality'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fio' => Yii::t('app', 'ФИО'),
            'user_id' => Yii::t('app', 'Фойдаланувчи'),
            'department_id' => Yii::t('app', 'Кафедра'),
            'img' => Yii::t('app', 'Расм'),
            'post' => Yii::t('app', 'Лавозим'),
            'type' => Yii::t('app', 'Тури'),
            'birthday' => Yii::t('app', 'Туғилган йили'),
            'birthplace' => Yii::t('app', 'Туғилган жойи'),
            'nationality' => Yii::t('app', ' Миллати'),
            'partiya' => Yii::t('app', 'Партиявийлиги'),
            'degree' => Yii::t('app', 'Маълумоти'),
            'ended' => Yii::t('app', 'Тамомлаган'),
            'specialization' => Yii::t('app', 'Маълумоти бўйича мутахассислиги'),
            'science_degree' => Yii::t('app', 'Илмий даражаси'),
            'science_title' => Yii::t('app', 'Илмий унвони'),
            'foreign_langs' => Yii::t('app', 'Кайси чет тилларини билади'),
            'gov_awards' => Yii::t('app', 'Давлат мукофотлари билан тақдирланганми (қанақа)'),
            'deputy' => Yii::t('app', 'Халқ депутатлари, республика, вилоят, шаҳар ва туман Кенгаши депутатими ёки бошқа  сайланадиган органларнинг аъзосими (тўлиқ кўрсатилиши лозим)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['group_head_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['lecturer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects0()
    {
        return $this->hasMany(Subject::className(), ['practice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects1()
    {
        return $this->hasMany(Subject::className(), ['lab1_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects2()
    {
        return $this->hasMany(Subject::className(), ['lab2_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}