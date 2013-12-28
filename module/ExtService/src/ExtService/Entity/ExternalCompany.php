<?php

namespace ExtService\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="externalCompany")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class ExternalCompany
{
    /**
     * @ODM\Id
     * @var int
     */
    protected $_id;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $link;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $source;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $id;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $code;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $ownerId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $id1s;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $contractNumber1s;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $fullName;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $uName;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $inn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $kpp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $okato;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $legalAdress;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $realAdress;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $orgBase;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderPostIp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderPostRp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderPostDp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderIp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderRp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $leaderDp;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $director;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $accountant;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $rs;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $ks;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $bank;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $bankAdress;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $bik;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $okpo;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $okvd;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $phone;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $email;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $contract;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $contractDate;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $saveSum;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $prrSum;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $defPay;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $boxCostA;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $boxCostB;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $boxCostC;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $representative;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $group;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $isOurFirm;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $responsibleWorker;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $nds;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $activity;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $ttn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $trn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $blocked;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $periodType;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $contractorId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $workType;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printConsignee;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $consigneeForPrint;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printShipper;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $shipperForPrint;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $noDesposcheme;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $wbImport;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $nonFood;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $whReturn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $informAboutAccount;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $serviceTitle;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $canChangeAdopted;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $temperature;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $autoAdopt;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $tariffFactor;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $daysOfDifferenceForOrder;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printMark;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printReceivingAct;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printCommissionForwarder;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printReceiptForwarder;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $docsTn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $docsTtn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $docsTrn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $printActp2;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $actp2ForPrint;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $insurance;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $wbStatusForBills;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $serviceType;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $nameInInvoice;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $cargoTypes;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $noticeOrderAdopt;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $orderImportFormatId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $transit;
    /**
     * @ODM\Date
     */
    protected $deletedAt;

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key])) {
                    $this->$key = $data[$key];
                }
            }
            $this->code = sprintf('%s-%s', $this->source, $this->id);
        }

        return $this;

    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }

        return $data;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $accountant
     */
    public function setAccountant($accountant)
    {
        $this->accountant = $accountant;
    }

    /**
     * @return string
     */
    public function getAccountant()
    {
        return $this->accountant;
    }

    /**
     * @param string $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param string $actp2ForPrint
     */
    public function setActp2ForPrint($actp2ForPrint)
    {
        $this->actp2ForPrint = $actp2ForPrint;
    }

    /**
     * @return string
     */
    public function getActp2ForPrint()
    {
        return $this->actp2ForPrint;
    }

    /**
     * @param string $autoAdopt
     */
    public function setAutoAdopt($autoAdopt)
    {
        $this->autoAdopt = $autoAdopt;
    }

    /**
     * @return string
     */
    public function getAutoAdopt()
    {
        return $this->autoAdopt;
    }

    /**
     * @param string $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param string $bankAdress
     */
    public function setBankAdress($bankAdress)
    {
        $this->bankAdress = $bankAdress;
    }

    /**
     * @return string
     */
    public function getBankAdress()
    {
        return $this->bankAdress;
    }

    /**
     * @param string $bik
     */
    public function setBik($bik)
    {
        $this->bik = $bik;
    }

    /**
     * @return string
     */
    public function getBik()
    {
        return $this->bik;
    }

    /**
     * @param string $blocked
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }

    /**
     * @return string
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param string $boxCostA
     */
    public function setBoxCostA($boxCostA)
    {
        $this->boxCostA = $boxCostA;
    }

    /**
     * @return string
     */
    public function getBoxCostA()
    {
        return $this->boxCostA;
    }

    /**
     * @param string $boxCostB
     */
    public function setBoxCostB($boxCostB)
    {
        $this->boxCostB = $boxCostB;
    }

    /**
     * @return string
     */
    public function getBoxCostB()
    {
        return $this->boxCostB;
    }

    /**
     * @param string $boxCostC
     */
    public function setBoxCostC($boxCostC)
    {
        $this->boxCostC = $boxCostC;
    }

    /**
     * @return string
     */
    public function getBoxCostC()
    {
        return $this->boxCostC;
    }

    /**
     * @param string $canChangeAdopted
     */
    public function setCanChangeAdopted($canChangeAdopted)
    {
        $this->canChangeAdopted = $canChangeAdopted;
    }

    /**
     * @return string
     */
    public function getCanChangeAdopted()
    {
        return $this->canChangeAdopted;
    }

    /**
     * @param string $cargoTypes
     */
    public function setCargoTypes($cargoTypes)
    {
        $this->cargoTypes = $cargoTypes;
    }

    /**
     * @return string
     */
    public function getCargoTypes()
    {
        return $this->cargoTypes;
    }

    /**
     * @param string $consigneeForPrint
     */
    public function setConsigneeForPrint($consigneeForPrint)
    {
        $this->consigneeForPrint = $consigneeForPrint;
    }

    /**
     * @return string
     */
    public function getConsigneeForPrint()
    {
        return $this->consigneeForPrint;
    }

    /**
     * @param string $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }

    /**
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param string $contractDate
     */
    public function setContractDate($contractDate)
    {
        $this->contractDate = $contractDate;
    }

    /**
     * @return string
     */
    public function getContractDate()
    {
        return $this->contractDate;
    }

    /**
     * @param string $contractNumber1s
     */
    public function setContractNumber1s($contractNumber1s)
    {
        $this->contractNumber1s = $contractNumber1s;
    }

    /**
     * @return string
     */
    public function getContractNumber1s()
    {
        return $this->contractNumber1s;
    }

    /**
     * @param string $contractorId
     */
    public function setContractorId($contractorId)
    {
        $this->contractorId = $contractorId;
    }

    /**
     * @return string
     */
    public function getContractorId()
    {
        return $this->contractorId;
    }

    /**
     * @param string $daysOfDifferenceForOrder
     */
    public function setDaysOfDifferenceForOrder($daysOfDifferenceForOrder)
    {
        $this->daysOfDifferenceForOrder = $daysOfDifferenceForOrder;
    }

    /**
     * @return string
     */
    public function getDaysOfDifferenceForOrder()
    {
        return $this->daysOfDifferenceForOrder;
    }

    /**
     * @param string $defPay
     */
    public function setDefPay($defPay)
    {
        $this->defPay = $defPay;
    }

    /**
     * @return string
     */
    public function getDefPay()
    {
        return $this->defPay;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param string $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param string $docsTn
     */
    public function setDocsTn($docsTn)
    {
        $this->docsTn = $docsTn;
    }

    /**
     * @return string
     */
    public function getDocsTn()
    {
        return $this->docsTn;
    }

    /**
     * @param string $docsTrn
     */
    public function setDocsTrn($docsTrn)
    {
        $this->docsTrn = $docsTrn;
    }

    /**
     * @return string
     */
    public function getDocsTrn()
    {
        return $this->docsTrn;
    }

    /**
     * @param string $docsTtn
     */
    public function setDocsTtn($docsTtn)
    {
        $this->docsTtn = $docsTtn;
    }

    /**
     * @return string
     */
    public function getDocsTtn()
    {
        return $this->docsTtn;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $id1s
     */
    public function setId1s($id1s)
    {
        $this->id1s = $id1s;
    }

    /**
     * @return string
     */
    public function getId1s()
    {
        return $this->id1s;
    }

    /**
     * @param string $informAboutAccount
     */
    public function setInformAboutAccount($informAboutAccount)
    {
        $this->informAboutAccount = $informAboutAccount;
    }

    /**
     * @return string
     */
    public function getInformAboutAccount()
    {
        return $this->informAboutAccount;
    }

    /**
     * @param string $inn
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }

    /**
     * @return string
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * @param string $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    /**
     * @return string
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param string $isOurFirm
     */
    public function setIsOurFirm($isOurFirm)
    {
        $this->isOurFirm = $isOurFirm;
    }

    /**
     * @return string
     */
    public function getIsOurFirm()
    {
        return $this->isOurFirm;
    }

    /**
     * @param string $kpp
     */
    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
    }

    /**
     * @return string
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * @param string $ks
     */
    public function setKs($ks)
    {
        $this->ks = $ks;
    }

    /**
     * @return string
     */
    public function getKs()
    {
        return $this->ks;
    }

    /**
     * @param string $leaderDp
     */
    public function setLeaderDp($leaderDp)
    {
        $this->leaderDp = $leaderDp;
    }

    /**
     * @return string
     */
    public function getLeaderDp()
    {
        return $this->leaderDp;
    }

    /**
     * @param string $leaderIp
     */
    public function setLeaderIp($leaderIp)
    {
        $this->leaderIp = $leaderIp;
    }

    /**
     * @return string
     */
    public function getLeaderIp()
    {
        return $this->leaderIp;
    }

    /**
     * @param string $leaderPostDp
     */
    public function setLeaderPostDp($leaderPostDp)
    {
        $this->leaderPostDp = $leaderPostDp;
    }

    /**
     * @return string
     */
    public function getLeaderPostDp()
    {
        return $this->leaderPostDp;
    }

    /**
     * @param string $leaderPostIp
     */
    public function setLeaderPostIp($leaderPostIp)
    {
        $this->leaderPostIp = $leaderPostIp;
    }

    /**
     * @return string
     */
    public function getLeaderPostIp()
    {
        return $this->leaderPostIp;
    }

    /**
     * @param string $leaderPostRp
     */
    public function setLeaderPostRp($leaderPostRp)
    {
        $this->leaderPostRp = $leaderPostRp;
    }

    /**
     * @return string
     */
    public function getLeaderPostRp()
    {
        return $this->leaderPostRp;
    }

    /**
     * @param string $leaderRp
     */
    public function setLeaderRp($leaderRp)
    {
        $this->leaderRp = $leaderRp;
    }

    /**
     * @return string
     */
    public function getLeaderRp()
    {
        return $this->leaderRp;
    }

    /**
     * @param string $legalAdress
     */
    public function setLegalAdress($legalAdress)
    {
        $this->legalAdress = $legalAdress;
    }

    /**
     * @return string
     */
    public function getLegalAdress()
    {
        return $this->legalAdress;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $nameInInvoice
     */
    public function setNameInInvoice($nameInInvoice)
    {
        $this->nameInInvoice = $nameInInvoice;
    }

    /**
     * @return string
     */
    public function getNameInInvoice()
    {
        return $this->nameInInvoice;
    }

    /**
     * @param string $nds
     */
    public function setNds($nds)
    {
        $this->nds = $nds;
    }

    /**
     * @return string
     */
    public function getNds()
    {
        return $this->nds;
    }

    /**
     * @param string $noDesposcheme
     */
    public function setNoDesposcheme($noDesposcheme)
    {
        $this->noDesposcheme = $noDesposcheme;
    }

    /**
     * @return string
     */
    public function getNoDesposcheme()
    {
        return $this->noDesposcheme;
    }

    /**
     * @param string $nonFood
     */
    public function setNonFood($nonFood)
    {
        $this->nonFood = $nonFood;
    }

    /**
     * @return string
     */
    public function getNonFood()
    {
        return $this->nonFood;
    }

    /**
     * @param string $noticeOrderAdopt
     */
    public function setNoticeOrderAdopt($noticeOrderAdopt)
    {
        $this->noticeOrderAdopt = $noticeOrderAdopt;
    }

    /**
     * @return string
     */
    public function getNoticeOrderAdopt()
    {
        return $this->noticeOrderAdopt;
    }

    /**
     * @param string $okato
     */
    public function setOkato($okato)
    {
        $this->okato = $okato;
    }

    /**
     * @return string
     */
    public function getOkato()
    {
        return $this->okato;
    }

    /**
     * @param string $okpo
     */
    public function setOkpo($okpo)
    {
        $this->okpo = $okpo;
    }

    /**
     * @return string
     */
    public function getOkpo()
    {
        return $this->okpo;
    }

    /**
     * @param string $okvd
     */
    public function setOkvd($okvd)
    {
        $this->okvd = $okvd;
    }

    /**
     * @return string
     */
    public function getOkvd()
    {
        return $this->okvd;
    }

    /**
     * @param string $orderImportFormatId
     */
    public function setOrderImportFormatId($orderImportFormatId)
    {
        $this->orderImportFormatId = $orderImportFormatId;
    }

    /**
     * @return string
     */
    public function getOrderImportFormatId()
    {
        return $this->orderImportFormatId;
    }

    /**
     * @param string $orgBase
     */
    public function setOrgBase($orgBase)
    {
        $this->orgBase = $orgBase;
    }

    /**
     * @return string
     */
    public function getOrgBase()
    {
        return $this->orgBase;
    }

    /**
     * @param string $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return string
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param string $periodType
     */
    public function setPeriodType($periodType)
    {
        $this->periodType = $periodType;
    }

    /**
     * @return string
     */
    public function getPeriodType()
    {
        return $this->periodType;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $printActp2
     */
    public function setPrintActp2($printActp2)
    {
        $this->printActp2 = $printActp2;
    }

    /**
     * @return string
     */
    public function getPrintActp2()
    {
        return $this->printActp2;
    }

    /**
     * @param string $printCommissionForwarder
     */
    public function setPrintCommissionForwarder($printCommissionForwarder)
    {
        $this->printCommissionForwarder = $printCommissionForwarder;
    }

    /**
     * @return string
     */
    public function getPrintCommissionForwarder()
    {
        return $this->printCommissionForwarder;
    }

    /**
     * @param string $printConsignee
     */
    public function setPrintConsignee($printConsignee)
    {
        $this->printConsignee = $printConsignee;
    }

    /**
     * @return string
     */
    public function getPrintConsignee()
    {
        return $this->printConsignee;
    }

    /**
     * @param string $printMark
     */
    public function setPrintMark($printMark)
    {
        $this->printMark = $printMark;
    }

    /**
     * @return string
     */
    public function getPrintMark()
    {
        return $this->printMark;
    }

    /**
     * @param string $printReceiptForwarder
     */
    public function setPrintReceiptForwarder($printReceiptForwarder)
    {
        $this->printReceiptForwarder = $printReceiptForwarder;
    }

    /**
     * @return string
     */
    public function getPrintReceiptForwarder()
    {
        return $this->printReceiptForwarder;
    }

    /**
     * @param string $printReceivingAct
     */
    public function setPrintReceivingAct($printReceivingAct)
    {
        $this->printReceivingAct = $printReceivingAct;
    }

    /**
     * @return string
     */
    public function getPrintReceivingAct()
    {
        return $this->printReceivingAct;
    }

    /**
     * @param string $printShipper
     */
    public function setPrintShipper($printShipper)
    {
        $this->printShipper = $printShipper;
    }

    /**
     * @return string
     */
    public function getPrintShipper()
    {
        return $this->printShipper;
    }

    /**
     * @param string $prrSum
     */
    public function setPrrSum($prrSum)
    {
        $this->prrSum = $prrSum;
    }

    /**
     * @return string
     */
    public function getPrrSum()
    {
        return $this->prrSum;
    }

    /**
     * @param string $realAdress
     */
    public function setRealAdress($realAdress)
    {
        $this->realAdress = $realAdress;
    }

    /**
     * @return string
     */
    public function getRealAdress()
    {
        return $this->realAdress;
    }

    /**
     * @param string $representative
     */
    public function setRepresentative($representative)
    {
        $this->representative = $representative;
    }

    /**
     * @return string
     */
    public function getRepresentative()
    {
        return $this->representative;
    }

    /**
     * @param string $responsibleWorker
     */
    public function setResponsibleWorker($responsibleWorker)
    {
        $this->responsibleWorker = $responsibleWorker;
    }

    /**
     * @return string
     */
    public function getResponsibleWorker()
    {
        return $this->responsibleWorker;
    }

    /**
     * @param string $rs
     */
    public function setRs($rs)
    {
        $this->rs = $rs;
    }

    /**
     * @return string
     */
    public function getRs()
    {
        return $this->rs;
    }

    /**
     * @param string $saveSum
     */
    public function setSaveSum($saveSum)
    {
        $this->saveSum = $saveSum;
    }

    /**
     * @return string
     */
    public function getSaveSum()
    {
        return $this->saveSum;
    }

    /**
     * @param string $serviceTitle
     */
    public function setServiceTitle($serviceTitle)
    {
        $this->serviceTitle = $serviceTitle;
    }

    /**
     * @return string
     */
    public function getServiceTitle()
    {
        return $this->serviceTitle;
    }

    /**
     * @param string $serviceType
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param string $shipperForPrint
     */
    public function setShipperForPrint($shipperForPrint)
    {
        $this->shipperForPrint = $shipperForPrint;
    }

    /**
     * @return string
     */
    public function getShipperForPrint()
    {
        return $this->shipperForPrint;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $tariffFactor
     */
    public function setTariffFactor($tariffFactor)
    {
        $this->tariffFactor = $tariffFactor;
    }

    /**
     * @return string
     */
    public function getTariffFactor()
    {
        return $this->tariffFactor;
    }

    /**
     * @param string $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return string
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param string $transit
     */
    public function setTransit($transit)
    {
        $this->transit = $transit;
    }

    /**
     * @return string
     */
    public function getTransit()
    {
        return $this->transit;
    }

    /**
     * @param string $trn
     */
    public function setTrn($trn)
    {
        $this->trn = $trn;
    }

    /**
     * @return string
     */
    public function getTrn()
    {
        return $this->trn;
    }

    /**
     * @param string $ttn
     */
    public function setTtn($ttn)
    {
        $this->ttn = $ttn;
    }

    /**
     * @return string
     */
    public function getTtn()
    {
        return $this->ttn;
    }

    /**
     * @param string $uName
     */
    public function setUName($uName)
    {
        $this->uName = $uName;
    }

    /**
     * @return string
     */
    public function getUName()
    {
        return $this->uName;
    }

    /**
     * @param string $wbImport
     */
    public function setWbImport($wbImport)
    {
        $this->wbImport = $wbImport;
    }

    /**
     * @return string
     */
    public function getWbImport()
    {
        return $this->wbImport;
    }

    /**
     * @param string $wbStatusForBills
     */
    public function setWbStatusForBills($wbStatusForBills)
    {
        $this->wbStatusForBills = $wbStatusForBills;
    }

    /**
     * @return string
     */
    public function getWbStatusForBills()
    {
        return $this->wbStatusForBills;
    }

    /**
     * @param string $whReturn
     */
    public function setWhReturn($whReturn)
    {
        $this->whReturn = $whReturn;
    }

    /**
     * @return string
     */
    public function getWhReturn()
    {
        return $this->whReturn;
    }

    /**
     * @param string $workType
     */
    public function setWorkType($workType)
    {
        $this->workType = $workType;
    }

    /**
     * @return string
     */
    public function getWorkType()
    {
        return $this->workType;
    }
}
