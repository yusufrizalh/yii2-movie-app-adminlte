<?php

namespace app\controllers;

use Yii;
use app\models\Movie;
use app\models\MovieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * MovieController implements the CRUD actions for Movie model.
 */
class MovieController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Movie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        /* change default search */
        $dataProvider->sort->defaultOrder = [
            'title' => SORT_ASC
        ];
        
        /* change perpage */
        $dataProvider->pagination->pageSize = 5;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionChart() {
        $movies = \app\models\Movie::find()->select('title, id AS sales')->asArray()->orderBy('RAND()')->limit(5)->all();
        $movie_data = []; 
        foreach($movies as $movie) {
            $movie_data[] = [
                $movie['title'], (int)$movie['sales'],
            ];
        }
        return $this->render('chart', [
            'movie_data' => $movie_data
        ]);
    }
    
    public function actionExport() {
        $movies = Movie::find()->all();
        $template = \Yii::getAlias("@webroot") . "/templates/movie.xlsx";
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($template);
        $worksheet = $spreadsheet->getActiveSheet();
        $baserow = 3;
        $no = 1;
        foreach($movies as $movie) {
            $row = $no + $baserow;
            $worksheet->getCell('A'. $row)->setValue($no);
            $worksheet->getCell('B'. $row)->setValue($movie->title);
            $worksheet->getCell('C'. $row)->setValue($movie->genre);
            $no++;
        }
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename:"movies.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
    
    public function actionImport() {
        $model = new \yii\base\DynamicModel([
            'fileImport'
        ]);
        $model->addRule(['fileImport'], 'required');
        $model->addRule(['fileImport'], 'file', ['extensions' => 'xlsx']);
        
        if ($model->load(Yii::$app->request->post())) {
            // perintah import data disini 
            $model->fileImport = \yii\web\UploadedFile::getInstance($model, 'fileImport');
            if ($model->fileImport && $model->validate()) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($model->fileImport->tempName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                $baseRow = 2;
                while(!empty($sheetData[$baseRow]['1'])) {
                    $movie = new Movie();
                    $movie->title = (string)$sheetData[$baseRow]['1'];
                    $movie->genre = (string)$sheetData[$baseRow]['2'];
                    $movie->save();
                    $baseRow++;
                }
            }
            Yii::$app->session->setFlash('success', 'Data berhasil diimport!');
            return $this->redirect(['index']);
        }
        return $this->render('import', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Movie model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Movie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movie();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Movie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Movie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Movie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movie::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
