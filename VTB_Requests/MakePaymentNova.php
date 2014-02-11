<?php defined('_JEXEC') or die('Restricted access');?><TKKPG>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:MakePaymentNova>
         <tem:ProviderAlias>{PROVIDERALIAS}</tem:ProviderAlias>
         <tem:ClientID>{CLIENTID}</tem:ClientID>
         <tem:CheckSum>{CHECKSUM}</tem:CheckSum>
         <tem:amount>{AMOUNT}</tem:amount>
         <tem:TransactionID>{TRANSACTIONID}</tem:TransactionID>
         <tem:SessionID>{SESSIONID}</tem:SessionID>
      </tem:MakePaymentNova>
   </soapenv:Body>
</soapenv:Envelope>