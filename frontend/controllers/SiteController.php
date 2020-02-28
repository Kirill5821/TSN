<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\AddItem;
use frontend\models\AddBid;
use frontend\models\AddAuction;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Item;
use common\models\Bid;
use common\models\Auction;
use common\models\User;
use yii\data\ActiveDataProvider;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
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

    public function actionCatalog() {
        $dataProvider = new ActiveDataProvider([
            'query' => Item::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        $items = Item::find()->asArray()->all();

        return $this->render('catalog', [
                    'items' => $items,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPageitem($id_item) {

        $model = new AddBid();
        //$model2 = new AddAuction();
        if ($model->load(Yii::$app->request->post()) && $model->add()
        //&& $model2->load(Yii::$app->request->post()) && $model2->add()) {
        ) {
            Yii::$app->session->setFlash('success', 'Thank you for added bid.');
            return $this->goHome();
        } else {
            $model->id_user = Yii::$app->user->identity;
            $model->id_auction = $id_item;
            //$model2->datestart = Yii::$app->formatter->asDate(time());
            $item = Item::find()->where(['id' => $id_item])->asArray()->one();
            $auction = Auction::find()->where(['id_item' => $id_item])->asArray()->one();
            return $this->render('pageitem', ['model' => $model, 'item' => $item, 'auction' => $auction]);
        }
    }

    public function actionPagebids($id_item) {
        $item = Item::find()->where(['id' => $id_item])->asArray()->one();
        $auction = Auction::find()->where(['id_item' => $id_item])->asArray()->one();
        $bids = Bid::find()->where(['id_auction' => $id_item])->asArray()->all();
        $dataProvider = new ActiveDataProvider([
            'query' => Bid::find(),
            'pagination' => [
                'pageSize' => 7,
            ],
        ]);
        return $this->render('pagebids', [
                    'item' => $item,
                    'bids' => $bids,
                    'auction' => $auction,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdditem() {
        $model = new AddItem();
        //$model2 = new AddAuction();
        if ($model->load(Yii::$app->request->post()) && $model->add()
        //&& $model2->load(Yii::$app->request->post()) && $model2->add()) {
        ) {
            Yii::$app->session->setFlash('success', 'Thank you for added item.');
            return $this->goHome();
        } else {
            $model->id_client = Yii::$app->user->identity;
            //$model2->datestart = Yii::$app->formatter->asDate(time());
            return $this->render('additem', [
                        'model' => $model,
                            //'model2' => $model2,
            ]);
        }
    }

    public function actionIndex() {
        $items = Item::find()->asArray()->all();

        $items2 = Item::find()->where(['id_catalog' => 1])->asArray()->all();
        return $this->render('index', [
                    'items' => $items,
                    'items2' => $items2,
        ]);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionVerifyEmail($token) {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    public function actionResendVerificationEmail() {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
                    'model' => $model
        ]);
    }

}
