<?php

namespace app\modules\organisations\controllers;

use Yii;
use app\models\Clubs;
use app\models\Organisations;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class OrgController extends Controller
{

    /**
     * index action
     * lists all organisations
     *
     * @return string
     */
    public function actionIndex()
    {

        $organisations = new ActiveDataProvider([
            'query' => Organisations::find()
        ]);

        return $this->render('index', [
            'organisations' => $organisations
        ]);

    } // end action



    /**
     * adding new organisation
     *
     * @return string
     */
    public function actionAddorg()
    {

        $neworganisation = new Organisations();

        if (Yii::$app->request->post() && $neworganisation->load(Yii::$app->request->post())) {
            if ($neworganisation->save()) {
                Yii::$app->session->setFlash('success', 'Организация добавлена');
            } else {
                Yii::$app->session->setFlash('danger', 'Сохранение не удалось');
            }
        }

        return $this->render('addorg', [
            'organisation' => $neworganisation
        ]);

    } // end action



    /**
     * lists all clubs
     *
     * @return string
     */
    public function actionClubs()
    {

        $dataprovider = new ActiveDataProvider([
            'query' => Clubs::find()
        ]);

        return $this->render('clubslist', [
            'clubsDataprovider' => $dataprovider
        ]);

    } // end action
    


    /**
     * adding new club
     *
     * @param integer $orgid
     * @return string
     */
    public function actionAddclub($orgid)
    {

        $newclub = new Clubs();
        $newclub->org_id = $orgid;

        // adding new club
        if (Yii::$app->request->post()) {
            if ($newclub->load(Yii::$app->request->post()) && $newclub->save()) {
                Yii::$app->session->setFlash('success', 'Клуб добавлен');
                $newclub = new Clubs();
            } else {
                Yii::$app->session->setFlash('danger', 'Сохранение не удалось');
            }
        }

        $request = '<b style="color: red;">Адрес не проверен</b>';

        if (isset($_POST['address'])) {
            $request = GeoApi::geoRequest(['adress' => $_POST['address'], 'json' => true, 'kind' => 'metro']);
        }

        // view
        return $this->render('addclub', [
            'club' => $newclub,
            'request' => $request
        ]);

    } // end action

} // end club
