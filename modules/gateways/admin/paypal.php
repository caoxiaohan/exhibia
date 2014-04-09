<?php
if(!class_exists('getPaypal')){
class getPaypal extends PayGateway {

    public function getPaypal() {
        $paypalInfo=new PaypalInfo();
        $result=$this->select($paypalInfo->getName());
        if(db_num_rows($result)==0) {
            $this->insert($paypalInfo->getName(), '', '', '', '');
            return $paypalInfo;
        }else {
            $obj=db_fetch_object($result);
            $paypalInfo->setBusinessId($obj->business_id);
            $paypalInfo->setToken($obj->token);
            $paypalInfo->setEnabled($obj->enabled);
            $paypalInfo->setTestMode($obj->testmode);
            return $paypalInfo;
        }
    }

    public function updatePaypal($paypalInfo) {
        $this->update($paypalInfo->getName(),$paypalInfo->getBusinessId(),$paypalInfo->getToken(),$paypalInfo->isEnabled(), $paypalInfo->isTestMode(), '','');
    }
}
}