<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/12/13
 * Time: 10:23 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ExtService\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="ext_service_company_entity")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class ExtServiceCompany
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
    protected $online_code;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $id;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $owner_id;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $id_1s;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $contract_number_1s;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $name;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $full_name;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $u_name;
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
    protected $legal_adress;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $real_adress;
    /**
     * @var string
    * @ODM\Field(type="string")
    */
    protected $org_base;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $leader_post_ip;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $leader_post_rp;
    /**
     * @var string
    * @ODM\Field(type="string")
    */
    protected $leader_post_dp;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $leader_ip;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $leader_rp;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $leader_dp;
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
    protected $bank_adress;
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
    protected $contract_date;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $save_sum;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $prr_sum;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $def_pay;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $box_cost_a;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $box_cost_b;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $box_cost_c;
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
    protected $is_our_firm;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $responsible_worker;
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
    protected $period_type;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $contractor_id;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $work_type;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_consignee;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $consignee_for_print;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_shipper;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $shipper_for_print;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $no_desposcheme;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $wb_import;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $non_food;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $wh_return;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $inform_about_account;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $service_title;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $can_change_adopted;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $temperature;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $auto_adopt;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $tariff_factor;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $days_of_difference_for_order;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_mark;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_receiving_act;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_commission_forwarder;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $print_receipt_forwarder;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $docs_tn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $docs_ttn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $docs_trn;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $print_actp2;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $actp2_for_print;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $insurance;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $wb_status_for_bills;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $service_type;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name_in_invoice;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $cargo_types;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $notice_order_adopt;
    /**
     * @var string
     * @ODM\Field(type="string")
    */
    protected $order_import_format_id;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $transit;
    /**
     * @ODM\Date
     */
    protected $deletedAt;

    /**
     * @param mixed $accountant
     */
    public function setAccountant($accountant)
    {
        $this->accountant = $accountant;
    }

    /**
     * @return mixed
     */
    public function getAccountant()
    {
        return $this->accountant;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $actp2_for_print
     */
    public function setActp2ForPrint($actp2_for_print)
    {
        $this->actp2_for_print = $actp2_for_print;
    }

    /**
     * @return mixed
     */
    public function getActp2ForPrint()
    {
        return $this->actp2_for_print;
    }

    /**
     * @param mixed $auto_adopt
     */
    public function setAutoAdopt($auto_adopt)
    {
        $this->auto_adopt = $auto_adopt;
    }

    /**
     * @return mixed
     */
    public function getAutoAdopt()
    {
        return $this->auto_adopt;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank_adress
     */
    public function setBankAdress($bank_adress)
    {
        $this->bank_adress = $bank_adress;
    }

    /**
     * @return mixed
     */
    public function getBankAdress()
    {
        return $this->bank_adress;
    }

    /**
     * @param mixed $bik
     */
    public function setBik($bik)
    {
        $this->bik = $bik;
    }

    /**
     * @return mixed
     */
    public function getBik()
    {
        return $this->bik;
    }

    /**
     * @param mixed $blocked
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }

    /**
     * @return mixed
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param mixed $box_cost_a
     */
    public function setBoxCostA($box_cost_a)
    {
        $this->box_cost_a = $box_cost_a;
    }

    /**
     * @return mixed
     */
    public function getBoxCostA()
    {
        return $this->box_cost_a;
    }

    /**
     * @param mixed $box_cost_b
     */
    public function setBoxCostB($box_cost_b)
    {
        $this->box_cost_b = $box_cost_b;
    }

    /**
     * @return mixed
     */
    public function getBoxCostB()
    {
        return $this->box_cost_b;
    }

    /**
     * @param mixed $box_cost_c
     */
    public function setBoxCostC($box_cost_c)
    {
        $this->box_cost_c = $box_cost_c;
    }

    /**
     * @return mixed
     */
    public function getBoxCostC()
    {
        return $this->box_cost_c;
    }

    /**
     * @param mixed $can_change_adopted
     */
    public function setCanChangeAdopted($can_change_adopted)
    {
        $this->can_change_adopted = $can_change_adopted;
    }

    /**
     * @return mixed
     */
    public function getCanChangeAdopted()
    {
        return $this->can_change_adopted;
    }

    /**
     * @param mixed $cargo_types
     */
    public function setCargoTypes($cargo_types)
    {
        $this->cargo_types = $cargo_types;
    }

    /**
     * @return mixed
     */
    public function getCargoTypes()
    {
        return $this->cargo_types;
    }

    /**
     * @param mixed $consignee_for_print
     */
    public function setConsigneeForPrint($consignee_for_print)
    {
        $this->consignee_for_print = $consignee_for_print;
    }

    /**
     * @return mixed
     */
    public function getConsigneeForPrint()
    {
        return $this->consignee_for_print;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract_date
     */
    public function setContractDate($contract_date)
    {
        $this->contract_date = $contract_date;
    }

    /**
     * @return mixed
     */
    public function getContractDate()
    {
        return $this->contract_date;
    }

    /**
     * @param mixed $contract_number_1s
     */
    public function setContractNumber1s($contract_number_1s)
    {
        $this->contract_number_1s = $contract_number_1s;
    }

    /**
     * @return mixed
     */
    public function getContractNumber1s()
    {
        return $this->contract_number_1s;
    }

    /**
     * @param mixed $contractor_id
     */
    public function setContractorId($contractor_id)
    {
        $this->contractor_id = $contractor_id;
    }

    /**
     * @return mixed
     */
    public function getContractorId()
    {
        return $this->contractor_id;
    }

    /**
     * @param mixed $days_of_difference_for_order
     */
    public function setDaysOfDifferenceForOrder($days_of_difference_for_order)
    {
        $this->days_of_difference_for_order = $days_of_difference_for_order;
    }

    /**
     * @return mixed
     */
    public function getDaysOfDifferenceForOrder()
    {
        return $this->days_of_difference_for_order;
    }

    /**
     * @param mixed $def_pay
     */
    public function setDefPay($def_pay)
    {
        $this->def_pay = $def_pay;
    }

    /**
     * @return mixed
     */
    public function getDefPay()
    {
        return $this->def_pay;
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
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $docs_tn
     */
    public function setDocsTn($docs_tn)
    {
        $this->docs_tn = $docs_tn;
    }

    /**
     * @return mixed
     */
    public function getDocsTn()
    {
        return $this->docs_tn;
    }

    /**
     * @param mixed $docs_trn
     */
    public function setDocsTrn($docs_trn)
    {
        $this->docs_trn = $docs_trn;
    }

    /**
     * @return mixed
     */
    public function getDocsTrn()
    {
        return $this->docs_trn;
    }

    /**
     * @param mixed $docs_ttn
     */
    public function setDocsTtn($docs_ttn)
    {
        $this->docs_ttn = $docs_ttn;
    }

    /**
     * @return mixed
     */
    public function getDocsTtn()
    {
        return $this->docs_ttn;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_1s
     */
    public function setId1s($id_1s)
    {
        $this->id_1s = $id_1s;
    }

    /**
     * @return mixed
     */
    public function getId1s()
    {
        return $this->id_1s;
    }

    /**
     * @param mixed $inform_about_account
     */
    public function setInformAboutAccount($inform_about_account)
    {
        $this->inform_about_account = $inform_about_account;
    }

    /**
     * @return mixed
     */
    public function getInformAboutAccount()
    {
        return $this->inform_about_account;
    }

    /**
     * @param mixed $inn
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }

    /**
     * @return mixed
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * @param mixed $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    /**
     * @return mixed
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param mixed $is_our_firm
     */
    public function setIsOurFirm($is_our_firm)
    {
        $this->is_our_firm = $is_our_firm;
    }

    /**
     * @return mixed
     */
    public function getIsOurFirm()
    {
        return $this->is_our_firm;
    }

    /**
     * @param mixed $kpp
     */
    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
    }

    /**
     * @return mixed
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * @param mixed $ks
     */
    public function setKs($ks)
    {
        $this->ks = $ks;
    }

    /**
     * @return mixed
     */
    public function getKs()
    {
        return $this->ks;
    }

    /**
     * @param mixed $leader_dp
     */
    public function setLeaderDp($leader_dp)
    {
        $this->leader_dp = $leader_dp;
    }

    /**
     * @return mixed
     */
    public function getLeaderDp()
    {
        return $this->leader_dp;
    }

    /**
     * @param mixed $leader_ip
     */
    public function setLeaderIp($leader_ip)
    {
        $this->leader_ip = $leader_ip;
    }

    /**
     * @return mixed
     */
    public function getLeaderIp()
    {
        return $this->leader_ip;
    }

    /**
     * @param mixed $leader_post_dp
     */
    public function setLeaderPostDp($leader_post_dp)
    {
        $this->leader_post_dp = $leader_post_dp;
    }

    /**
     * @return mixed
     */
    public function getLeaderPostDp()
    {
        return $this->leader_post_dp;
    }

    /**
     * @param mixed $leader_post_ip
     */
    public function setLeaderPostIp($leader_post_ip)
    {
        $this->leader_post_ip = $leader_post_ip;
    }

    /**
     * @return mixed
     */
    public function getLeaderPostIp()
    {
        return $this->leader_post_ip;
    }

    /**
     * @param mixed $leader_post_rp
     */
    public function setLeaderPostRp($leader_post_rp)
    {
        $this->leader_post_rp = $leader_post_rp;
    }

    /**
     * @return mixed
     */
    public function getLeaderPostRp()
    {
        return $this->leader_post_rp;
    }

    /**
     * @param mixed $leader_rp
     */
    public function setLeaderRp($leader_rp)
    {
        $this->leader_rp = $leader_rp;
    }

    /**
     * @return mixed
     */
    public function getLeaderRp()
    {
        return $this->leader_rp;
    }

    /**
     * @param mixed $legal_adress
     */
    public function setLegalAdress($legal_adress)
    {
        $this->legal_adress = $legal_adress;
    }

    /**
     * @return mixed
     */
    public function getLegalAdress()
    {
        return $this->legal_adress;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name_in_invoice
     */
    public function setNameInInvoice($name_in_invoice)
    {
        $this->name_in_invoice = $name_in_invoice;
    }

    /**
     * @return mixed
     */
    public function getNameInInvoice()
    {
        return $this->name_in_invoice;
    }

    /**
     * @param mixed $nds
     */
    public function setNds($nds)
    {
        $this->nds = $nds;
    }

    /**
     * @return mixed
     */
    public function getNds()
    {
        return $this->nds;
    }

    /**
     * @param mixed $no_desposcheme
     */
    public function setNoDesposcheme($no_desposcheme)
    {
        $this->no_desposcheme = $no_desposcheme;
    }

    /**
     * @return mixed
     */
    public function getNoDesposcheme()
    {
        return $this->no_desposcheme;
    }

    /**
     * @param mixed $non_food
     */
    public function setNonFood($non_food)
    {
        $this->non_food = $non_food;
    }

    /**
     * @return mixed
     */
    public function getNonFood()
    {
        return $this->non_food;
    }

    /**
     * @param mixed $notice_order_adopt
     */
    public function setNoticeOrderAdopt($notice_order_adopt)
    {
        $this->notice_order_adopt = $notice_order_adopt;
    }

    /**
     * @return mixed
     */
    public function getNoticeOrderAdopt()
    {
        return $this->notice_order_adopt;
    }

    /**
     * @param mixed $okato
     */
    public function setOkato($okato)
    {
        $this->okato = $okato;
    }

    /**
     * @return mixed
     */
    public function getOkato()
    {
        return $this->okato;
    }

    /**
     * @param mixed $okpo
     */
    public function setOkpo($okpo)
    {
        $this->okpo = $okpo;
    }

    /**
     * @return mixed
     */
    public function getOkpo()
    {
        return $this->okpo;
    }

    /**
     * @param mixed $okvd
     */
    public function setOkvd($okvd)
    {
        $this->okvd = $okvd;
    }

    /**
     * @return mixed
     */
    public function getOkvd()
    {
        return $this->okvd;
    }

    /**
     * @param mixed $order_import_format_id
     */
    public function setOrderImportFormatId($order_import_format_id)
    {
        $this->order_import_format_id = $order_import_format_id;
    }

    /**
     * @return mixed
     */
    public function getOrderImportFormatId()
    {
        return $this->order_import_format_id;
    }

    /**
     * @param mixed $org_base
     */
    public function setOrgBase($org_base)
    {
        $this->org_base = $org_base;
    }

    /**
     * @return mixed
     */
    public function getOrgBase()
    {
        return $this->org_base;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $period_type
     */
    public function setPeriodType($period_type)
    {
        $this->period_type = $period_type;
    }

    /**
     * @return mixed
     */
    public function getPeriodType()
    {
        return $this->period_type;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $print_actp2
     */
    public function setPrintActp2($print_actp2)
    {
        $this->print_actp2 = $print_actp2;
    }

    /**
     * @return mixed
     */
    public function getPrintActp2()
    {
        return $this->print_actp2;
    }

    /**
     * @param mixed $print_commission_forwarder
     */
    public function setPrintCommissionForwarder($print_commission_forwarder)
    {
        $this->print_commission_forwarder = $print_commission_forwarder;
    }

    /**
     * @return mixed
     */
    public function getPrintCommissionForwarder()
    {
        return $this->print_commission_forwarder;
    }

    /**
     * @param mixed $print_consignee
     */
    public function setPrintConsignee($print_consignee)
    {
        $this->print_consignee = $print_consignee;
    }

    /**
     * @return mixed
     */
    public function getPrintConsignee()
    {
        return $this->print_consignee;
    }

    /**
     * @param mixed $print_mark
     */
    public function setPrintMark($print_mark)
    {
        $this->print_mark = $print_mark;
    }

    /**
     * @return mixed
     */
    public function getPrintMark()
    {
        return $this->print_mark;
    }

    /**
     * @param mixed $print_receipt_forwarder
     */
    public function setPrintReceiptForwarder($print_receipt_forwarder)
    {
        $this->print_receipt_forwarder = $print_receipt_forwarder;
    }

    /**
     * @return mixed
     */
    public function getPrintReceiptForwarder()
    {
        return $this->print_receipt_forwarder;
    }

    /**
     * @param mixed $print_receiving_act
     */
    public function setPrintReceivingAct($print_receiving_act)
    {
        $this->print_receiving_act = $print_receiving_act;
    }

    /**
     * @return mixed
     */
    public function getPrintReceivingAct()
    {
        return $this->print_receiving_act;
    }

    /**
     * @param mixed $print_shipper
     */
    public function setPrintShipper($print_shipper)
    {
        $this->print_shipper = $print_shipper;
    }

    /**
     * @return mixed
     */
    public function getPrintShipper()
    {
        return $this->print_shipper;
    }

    /**
     * @param mixed $prr_sum
     */
    public function setPrrSum($prr_sum)
    {
        $this->prr_sum = $prr_sum;
    }

    /**
     * @return mixed
     */
    public function getPrrSum()
    {
        return $this->prr_sum;
    }

    /**
     * @param mixed $real_adress
     */
    public function setRealAdress($real_adress)
    {
        $this->real_adress = $real_adress;
    }

    /**
     * @return mixed
     */
    public function getRealAdress()
    {
        return $this->real_adress;
    }

    /**
     * @param mixed $representative
     */
    public function setRepresentative($representative)
    {
        $this->representative = $representative;
    }

    /**
     * @return mixed
     */
    public function getRepresentative()
    {
        return $this->representative;
    }

    /**
     * @param mixed $responsible_worker
     */
    public function setResponsibleWorker($responsible_worker)
    {
        $this->responsible_worker = $responsible_worker;
    }

    /**
     * @return mixed
     */
    public function getResponsibleWorker()
    {
        return $this->responsible_worker;
    }

    /**
     * @param mixed $rs
     */
    public function setRs($rs)
    {
        $this->rs = $rs;
    }

    /**
     * @return mixed
     */
    public function getRs()
    {
        return $this->rs;
    }

    /**
     * @param mixed $save_sum
     */
    public function setSaveSum($save_sum)
    {
        $this->save_sum = $save_sum;
    }

    /**
     * @return mixed
     */
    public function getSaveSum()
    {
        return $this->save_sum;
    }

    /**
     * @param mixed $service_title
     */
    public function setServiceTitle($service_title)
    {
        $this->service_title = $service_title;
    }

    /**
     * @return mixed
     */
    public function getServiceTitle()
    {
        return $this->service_title;
    }

    /**
     * @param mixed $service_type
     */
    public function setServiceType($service_type)
    {
        $this->service_type = $service_type;
    }

    /**
     * @return mixed
     */
    public function getServiceType()
    {
        return $this->service_type;
    }

    /**
     * @param mixed $shipper_for_print
     */
    public function setShipperForPrint($shipper_for_print)
    {
        $this->shipper_for_print = $shipper_for_print;
    }

    /**
     * @return mixed
     */
    public function getShipperForPrint()
    {
        return $this->shipper_for_print;
    }

    /**
     * @param mixed $tariff_factor
     */
    public function setTariffFactor($tariff_factor)
    {
        $this->tariff_factor = $tariff_factor;
    }

    /**
     * @return mixed
     */
    public function getTariffFactor()
    {
        return $this->tariff_factor;
    }

    /**
     * @param mixed $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param mixed $transit
     */
    public function setTransit($transit)
    {
        $this->transit = $transit;
    }

    /**
     * @return mixed
     */
    public function getTransit()
    {
        return $this->transit;
    }

    /**
     * @param mixed $trn
     */
    public function setTrn($trn)
    {
        $this->trn = $trn;
    }

    /**
     * @return mixed
     */
    public function getTrn()
    {
        return $this->trn;
    }

    /**
     * @param mixed $ttn
     */
    public function setTtn($ttn)
    {
        $this->ttn = $ttn;
    }

    /**
     * @return mixed
     */
    public function getTtn()
    {
        return $this->ttn;
    }

    /**
     * @param mixed $u_name
     */
    public function setUName($u_name)
    {
        $this->u_name = $u_name;
    }

    /**
     * @return mixed
     */
    public function getUName()
    {
        return $this->u_name;
    }

    /**
     * @param mixed $wb_import
     */
    public function setWbImport($wb_import)
    {
        $this->wb_import = $wb_import;
    }

    /**
     * @return mixed
     */
    public function getWbImport()
    {
        return $this->wb_import;
    }

    /**
     * @param mixed $wb_status_for_bills
     */
    public function setWbStatusForBills($wb_status_for_bills)
    {
        $this->wb_status_for_bills = $wb_status_for_bills;
    }

    /**
     * @return mixed
     */
    public function getWbStatusForBills()
    {
        return $this->wb_status_for_bills;
    }

    /**
     * @param mixed $wh_return
     */
    public function setWhReturn($wh_return)
    {
        $this->wh_return = $wh_return;
    }

    /**
     * @return mixed
     */
    public function getWhReturn()
    {
        return $this->wh_return;
    }

    /**
     * @param mixed $work_type
     */
    public function setWorkType($work_type)
    {
        $this->work_type = $work_type;
    }

    /**
     * @return mixed
     */
    public function getWorkType()
    {
        return $this->work_type;
    }

    /**
     * @param string $online_code
     */
    public function setOnlineCode($online_code)
    {
        $this->online_code = $online_code;
    }

    /**
     * @return string
     */
    public function getOnlineCode()
    {
        return $this->online_code;
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

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key])) {
                    $this->$key = $data[$key];
                }
            }
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
}