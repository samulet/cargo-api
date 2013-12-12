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
use Zend\Form\Annotation;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Collection;

/**
 * @ODM\Document(collection="xtServiceCompanyEntity")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class ExtServiceCompanyEntity
{
    protected $id;
    protected $owner_id;
    protected $id_1s;
    protected $contract_number_1s;
    protected $name;
    protected $full_name;
    protected $u_name;
    protected $inn;
    protected $kpp;
    protected $okato;
    protected $legal_adress;
    protected $real_adress;
    protected $org_base;
    protected $leader_post_ip;
    protected $leader_post_rp;
    protected $leader_post_dp;
    protected $leader_ip;
    protected $leader_rp;
    protected $leader_dp;
    protected $director;
    protected $accountant;
    protected $rs;
    protected $ks;
    protected $bank;
    protected $bank_adress;
    protected $bik;
    protected $okpo;
    protected $okvd;
    protected $phone;
    protected $email;
    protected $contract;
    protected $contract_date;
    protected $save_sum;
    protected $prr_sum;
    protected $def_pay;
    protected $box_cost_a;
    protected $box_cost_b;
    protected $box_cost_c;
    protected $representative;
    protected $group;
    protected $is_our_firm;
    protected $responsible_worker;
    protected $nds;
    protected $activity;
    protected $ttn;
    protected $trn;
    protected $blocked;
    protected $period_type;
    protected $contractor_id;
    protected $work_type;
    protected $print_consignee;
    protected $consignee_for_print;
    protected $print_shipper;
    protected $shipper_for_print;
    protected $no_desposcheme;
    protected $wb_import;
    protected $non_food;
    protected $wh_return;
    protected $inform_about_account;
    protected $service_title;
    protected $can_change_adopted;
    protected $temperature;
    protected $auto_adopt;
    protected $tariff_factor;
    protected $days_of_difference_for_order;
    protected $print_mark;
    protected $print_receiving_act;
    protected $print_commission_forwarder;
    protected $print_receipt_forwarder;
    protected $docs_tn;
    protected $docs_ttn;
    protected $docs_trn;
    protected $print_actp2;
    protected $actp2_for_print;
    protected $insurance;
    protected $wb_status_for_bills;
    protected $service_type;
    protected $name_in_invoice;
    protected $cargo_types;
    protected $notice_order_adopt;
    protected $order_import_format_id;
    protected $transit;
    /**
 * @ODM\Date
 */
    protected $deletedAt;


}