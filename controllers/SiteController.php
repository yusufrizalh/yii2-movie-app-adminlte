<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
        
        /*
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(), 
                'rules' => [
                    ['actions' => ['index', 'view'], 
                     'allow' => true, 'roles' => ['?'], ],
                    ['allow' => true, 'roles' => ['@'], 
                    'matchCallback' => function($rule, $action) {
                        $user = \Yii::$app->user->identity;
                        if ($user->role == 'admin') {
                            return true;
                        }
                    }], 
                ], 
            ], 
        ];*/
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    // membuat function baru hello world 
    public function actionHelloInixindo() {
        // return "Hello Inixindo Surabaya!";
        return $this->render('helloinixindo');
    }
    
    // membuat function untuk action register 
    public function actionRegister() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new \app\models\RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            // membuat customer baru 
            $customer = new \app\models\Customer();
            $customer->username = $model->username;
            $customer->email = $model->email;
            $security = \Yii::$app->security;
            $customer->password_hash = $security->generatePasswordHash($model->password);
            $customer->auth_key = $security->generateRandomString();
            $customer->role = 'customer';
            $customer->status = 1;
            
            if ($customer->save()) {
                Yii::$app->session->setFlash('success', 'Registrasi Berhasil!');
            } else {
                Yii::$app->session->setFlash('error', 'Registrasi Gagal!');
            }
            return $this->goBack();
        }
        
        return $this->render('register', ['model' => $model, ]);
    }
    
    // membuat function untuk action export ke excel
    public function actionExport() {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello Inixindo!');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        // $writer->save('helloinixindo.xlsx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename:"_export2.xlsx"');
        $writer->save('php://output');
        exit;
    }
    
}