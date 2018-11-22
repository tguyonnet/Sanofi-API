<?php

chdir(__DIR__);

require './vendor/autoload.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \RedBeanPHP\R as R;



//R::setup('mysql:host='.\Config\Bdd::HOST.';dbname='.\Config\Bdd::DBNAME.'',\Config\Bdd::USERNAME,\Config\Bdd::PASSWORD);
R::setup('mysql:host=localhost;dbname=sanofi_v0','usersio','pwsio');



$dataGenerator = Faker\Factory::create('fr_FR');


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);



$app->get('/visiteurMedical', \Controllers\VisiteurMedical::class . ':getVisiteurMedical');

$app->get('/visiteurMedical/{id}', \Controllers\VisiteurMedical::class . ':getVisiteurMedicalById');




//// ROUTES THEO
$app->get('/formation', \Controllers\Formation::class . ':getFormation');
$app->get('/formation/{id}', \Controllers\Formation::class . ':getFormationId');
$app->get('/formation/{date}/', \Controllers\Formation::class . ':getFormationDate');
$app->get('/formation/{employee_id}/', \Controllers\Formation::class . ':getFormationEmployee');
$app->get('/formation/{employee_id}/{date}', \Controllers\Formation::class . ':getFormationEmployeeDate');





$app->get('/career/{employee_id}/post', \Controllers\Career::class . ':getCareerEmployeePost');
$app->get('/career/{employee_id}/{post_id}/mission', \Controllers\Career::class . ':getCareerEmployeePostMission');
$app->get('/career/{employee_id}/{post_id}/salary', \Controllers\Career::class . ':getCareerEmployeePostSalary');
$app->get('/career/{employee_id}/{post_id}/bounty', \Controllers\Career::class . ':getCareerEmployeePostBounty');

$app->get('/career/{employee_id}/{post_id}/hiringDate', \Controllers\Career::class . ':getCareerEmployeePostHiringDate');
$app->get('/career/{employee_id}/{post_id}/termination', \Controllers\Career::class . ':getCareerEmployeePostTermination');
$app->get('/career/{employee_id}/{post_id}/retirement', \Controllers\Career::class . ':getCareerEmployeePostRetirement');
$app->get('/career/{employee_id}/{post_id}/resignation', \Controllers\Career::class . ':getCareerEmployeePostResignation');

$app->get('/career/{employee_id}/{post_id}/{date}', \Controllers\Career::class . ':getCareerEmployeePostDate');
$app->get('/career/{employee_id}/{post_id}/mission/{date}', \Controllers\Career::class . ':getCareerEmployeePostMissionDate');
$app->get('/career/{employee_id}/{post_id}/salary/{date}', \Controllers\Career::class . ':getCareerEmployeePostSalaryDate');
$app->get('/career/{employee_id}/{post_id}/bounty/{date}', \Controllers\Career::class . ':getCareerEmployeePostBountyDate');





$app->get('/Absence/{date}', \Controllers\Absence::class . ':getAbsenceDate');
$app->get('/Absence/{employee_id}', \Controllers\Absence::class . ':getAbsenceEmployee_id');
$app->get('/Absence/{employee_id}/{date}', \Controllers\Absence::class . ':getAbsenceEmployee_idDate');
$app->get('/Absence/{employee_id}/disease', \Controllers\Absence::class . ':getAbsenceEmployee_idDisease');
$app->get('/Absence/{employee_id}/rtt', \Controllers\Absence::class . ':getAbsenceEmployee_idRtt');
$app->get('/Absence/{employee_id}/furlough', \Controllers\Absence::class . ':getAbsenceEmployee_idFurlough');

$app->get('/Absence/{employee_id}/disease/{date}', \Controllers\Absence::class . ':getAbsenceEmployee_idDiseaseDate');
$app->get('/Absence/{employee_id}/rtt/{date}', \Controllers\Absence::class . ':getAbsenceEmployee_idRttDate');
$app->get('/Absence/{employee_id}/furlough/{date}', \Controllers\Absence::class . ':getAbsenceEmployee_idFurloughDate');

$app->get('/Absence/disease/{date}', \Controllers\Absence::class . ':getAbsenceDiseaseDate');
$app->get('/Absence/rtt/{date}', \Controllers\Absence::class . ':getAbsenceRttDate');
$app->get('/Absence/furlough/{date}', \Controllers\Absence::class . ':getAbsenceFurloughDate');




////ROUTE VALENTIN

$app->get('/Costs/{employee_id)/one/{frais_id}',\Controlles\Costs::class . ':getCost_idCost');
$app->get('/Costs/{employee_id)/allDay/{date}',\Controlles\Costs::class . ':getCostsVisitorPerDay');
$app->get('/Costs/{employee_id)/allMonth/{date}',\Controlles\Costs::class . ':getCostsVisitorPerMonth');

$app->get('/Report/{employee_id)/all',\Controlles\Report::class . ':getAllVisitorReports');
$app->get('/Report/{employee_id)/one/{report_id}',\Controller\Report::class . ':getOneVisitorReport');

$app->get('/ReportCard/{employee_id)/one/{month}',\Controller\ReportCard::class . ':getReportCardsPerMonth');
$app->get('/ReportCard/{employee_id)/all',\Controller\ReportCard::class . ':getAllReportCards');

$app->get('/praticioner/outPackageCosts/{employee_id}/create/{cost_libelle}/{cost_description}/{cost_amount}/{image_bill}',\Controller\ReportCard::class . ':postOutPackageCost');
$app->get('/praticioner/outPackageCosts/{employee_id}/modify/{cost_libelle}/{cost_description}/{cost_amount}/{image_bill}',\Controller\ReportCard::class . ':putOutPackageCost');
$app->get('/praticioner/outPackageCosts/{employee_id}/delete/{outPackageCosts_id}',\Controller\ReportCard::class . ':DeleteOutPackageCost');


$app->get('/praticioner/flatCosts/{employee_id}/create/{cost_libelle}/{cost_description}/{cost_amount}/{visitorReport_id}',\Controller\ReportCard::class . ':postFlatCost');
$app->get('/praticioner/flatCosts/{employee_id}/modify/{cost_libelle}/{cost_description}/{cost_amount}/{visitorReport_id}',\Controller\ReportCard::class . ':putFlatCost');
$app->get('/praticioner/flatCosts/{employee_id}/delete/{flatCosts_id}',\Controller\ReportCard::class . ':DeleteFlatCost');



$app->run();

