<?php


namespace App\Service;


use App\Entity\Annoucement;
use App\Repository\AnnoucementRepository;
use Doctrine\Common\Persistence\ObjectManager;

class UserManager
{
    private $annoucementRepository;
    private $objectManager;

    public function __construct(ObjectManager $objectManager, AnnoucementRepository $annoucementRepository)
    {
        $this->annoucementRepository = $annoucementRepository;
        $this->objectManager = $objectManager;
    }

    public function save(Annoucement $annoucement) {
        $this->objectManager->persist($annoucement);
        $this->objectManager->flush();
    }

    public function findAllAnnoucements() {
        return $this->annoucementRepository->findAll();
    }

    public function find2Annoucements() {
        return $this->annoucementRepository->find2();
    }

    public function findAnnoucementsFromTo(int $start, int $end) {
        return $this->annoucementRepository->findFromTo($start, $end);
    }

    public function findRecordsSize() {
        return $this->annoucementRepository->findRecordsSize();
    }

    public function findAnnoucementById(int $id) {
        return $this->annoucementRepository->findById($id);
}
}