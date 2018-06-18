<?php

namespace app\modules\organisations\controllers;

use app\models\custom\GeoApi;
use mirocow\yandexmaps\GeoObjectCollection;
use Yii;
use app\models\Clubs;
use app\models\Organisations;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
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
     *
     *
     * @return bool|\SimpleXMLElement|string
     */
    public function actionCheckaddress()
    {

        if (Yii::$app->request->isAjax && isset($_POST['address'])) {

            $result = '';

            $result = GeoApi::request(['address' => $_POST['address'], 'json' => false]);
            //$result = json_decode(json_encode($result), TRUE);
            //$result = $result['GeoObjectCollection'];

            /*if (isset($result['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['precision'])) {
                $flag = $result['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['precision'];
            }*/

            $result = GeoApi::getExact($result);

            if (isset($result['precision']) && $result['precision'] == 'exact') {
                $flag = 'exact';
            } else {
                $flag = 'notfound';
            }

            $flag = 'exact';

            if ($flag == 'exact') {
                return $this->renderAjax('ajax/search', [
                    'flag' => $flag,
                    'data' => $result
                ]);
            } else {
                return $this->renderAjax('ajax/error');
            }

        }

        return false;

    } // end action



    /**
     * adding new club
     *
     * @param integer $orgid
     * @return string
     */
    public function actionAddclub($orgid)
    {

        GeoApi::request(['address' => 'Москва', 'json' => false]);

        isset($_POST['address']) ? $request = '' : $request = '<b id="result" style="color: red;">Адрес не проверен</b>';

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

        /*if (isset($_POST['address'])) {
            $request = GeoApi::geoRequest(['adress' => $_POST['address'], 'json' => true, 'kind' => 'metro']);
        }*/

        // view
        return $this->render('addclub', [
            'club' => $newclub,
            'request' => $request
        ]);

    } // end action

} // end club
