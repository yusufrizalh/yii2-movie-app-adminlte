<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $genre
 * @property string $director
 * @property string $rating
 * @property int $duration
 * @property string $cover
 *
 * @property Schedule[] $schedules
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['duration'], 'integer'],
            [['title', 'genre', 'cover'], 'string', 'max' => 255],
            [['director'], 'string', 'max' => 100],
            [['rating'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'genre' => 'Genre',
            'director' => 'Director',
            'rating' => 'Rating',
            'duration' => 'Duration',
            'cover' => 'Cover',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['movie_id' => 'id']);
    }
}
