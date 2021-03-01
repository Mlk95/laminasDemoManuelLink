<?php


namespace Userdata\Controller;


use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Userdata\Model\UserTable;
use Userdata\Service\DownloadUserDataService;

class UserdataController extends AbstractActionController
{

    /** @var UserTable  */
    private $table;


    /** @var DownloadUserDataService */
    private $downloadService;

    /**
     * UserdataController constructor.
     * Beispiel Typehint und ohne declare(strict_types=1);.
     * @param UserTable $userTable
     * @param DownloadUserDataService $downloadService
     */
    public function __construct(UserTable $userTable, DownloadUserDataService $downloadService)
    {
        $this->table = $userTable;
        $this->downloadService = $downloadService;
    }

    /**
     * Index Action die aufgerufen wird wenn ich per URL auf das Userdata Modul gehe.
     * Listet alle User und übergibt diese an das ViewModell.
     */
    public function indexAction() : ViewModel
    {
        /**
         * Return von ViewModel Instanz das Userdaten enthält, diese werden automatisch an das view script gereicht in unserem Fall index.php
         */
        return new ViewModel(
            [
                'users' => $this->table->fetchAll(),
            ]
        );
    }

    /**
     * Mit der Action könnte man über ein Suchfeld per POST Filterparameter an Action schicken und die dementsprechenden User Daten an die View wieder übergeben.
     * Sowas wäre natürlich auch im FrontEnd möglich mit JavaScript aber gerade wenn es mal viele Datensätze sind und sowas wie Pagination noch dazu kommt macht das dann Sinn.
     */
    //WIP
    public function fetchUserdataAction() : ViewModel
    {
        /** @var String $filterData */
        $filterData = $_GET['filter'];

        return new ViewModel(
            [
                'users' => $this->table->getUserByLastName($filterData),
            ]
        );
    }

    /**
     * Auswählen einer Spalte, aktuell Button neben der Spalte der Action aufrufen soll, um Daten von User innerhalb einer PDF zusammenzustellen und runterzuladen.
     */
    //WIP
    public function downloadUserdataAction(): ViewModel
    {
        $id = $_POST['id'];
        $this->downloadService->downloadUserData($id);

        return new ViewModel(
            [
                'users' => $this->table->fetchAll(),
            ]
        );
    }


}