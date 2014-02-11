<?php

class CurlSOAPClient
{
	private static $instance;
	protected $Address = '';

	public function __construct( $Address )
	{
		$this->Address = $Address;

	}

	public static function getInstance( $Address )
	{
		if ( self::$instance === null )
		{
			self::$instance = new self( $Address );
		}
		return self::$instance;

	}

	public function debitcheckuser( $cashier, $branch, $user, $hash )
	{
		$R = new stdClass();
		$R->cashier = $cashier;
		$R->branch = $branch;
		$R->user = $user;
		$R->hash = $hash;
		$request = self::getRequest( 'debitcheckuser', $R );
		if ( !$request )
		{
			return false;
		}
		$Res = self::doRequest( $this->Address, $request );
		if ( !$Res )
		{
			return false;
		}
		$result = new stdClass();
		$result->status = $this->parseXml( $Res, 'status' );
		if ( $result->status != 'true' )
		{
			return false;
		}
		$result->name = $this->parseXml( $Res, 'name' );
		$result->surname = $this->parseXml( $Res, 'surname' );
		$result->private_number = $this->parseXml( $Res, 'private_number' );
		$result->pin = $this->parseXml( $Res, 'pin' );
		$result->address = $this->parseXml( $Res, 'address' );
		$result->mobile = $this->parseXml( $Res, 'mobile ' );
		$result->balance = $this->parseXml( $Res, 'balance' );
		return $result;

	}

	public function debitbegin( $cashier, $branch, $transactionID, $pin, $amount, $hash )
	{
		$R = new stdClass();
		$R->cashier = $cashier;
		$R->branch = $branch;
		$R->transactionID = $transactionID;
		$R->pin = $pin;
		$R->amount = $amount;
		$R->hash = $hash;
		$request = self::getRequest( 'debitbegin', $R );
		if ( !$request )
		{
			return false;
		}
		$Res = self::doRequest( $this->Address, $request );
		if ( !$Res )
		{
			return false;
		}
		$result = new stdClass();
		$result->status = $this->parseXml( $Res, 'status' );
		if ( $result->status != 'true' )
		{
			return false;
		}
		$result->extrenal_id = $this->parseXml( $Res, 'eutransid' );
		return $result;

	}

	public function debitcommit( $cashier, $branch, $extrenal_id, $hash )
	{
		$R = new stdClass();
		$R->cashier = $cashier;
		$R->branch = $branch;
		$R->EUTRANSACTIONID = $extrenal_id;
		$R->hash = $hash;
		$request = self::getRequest( 'debitcommit', $R );
		if ( !$request )
		{
			return false;
		}
		$Res = self::doRequest( $this->Address, $request );
		if ( !$Res )
		{
			return false;
		}
		$result = new stdClass();
		$result->status = $this->parseXml( $Res, 'status' );
		if ( $result->status != 'true' )
		{
			return false;
		}
		$result->code = $this->parseXml( $Res, 'code' );
		return $result;

	}

	public function doRequest( $url, $request )
	{
		if ( !$url || !$request )
			return false;
		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'POST', 'Content-Type: text/xml; charset=utf-8' ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 15 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $request );
		$buffer = curl_exec( $ch );
		curl_close( $ch );
		return $buffer;

	}

	public static function getRequest( $method, $parametres )
	{
		if ( !$method || !$parametres )
		{
			return false;
		}
		ob_start();
		require_once('BET_Requests/' . strtolower( $method ) . '.php');
		$response = ob_get_clean();
		foreach ( $parametres as $k => $v )
		{
			$response = str_replace( '{' . strtoupper( $k ) . '}', $v, $response );
		}
		return $response;

	}

	public static function getXml( $method )
	{
		ob_start();
		require_once('BET_Requests/' . strtolower( $method ) . '.php');
		$response = ob_get_clean();
		return $response;

	}

	public function parseXml( $xml, $tag )
	{
		$regV = '/(?<=^|>)[^><]+?(?=<\/' . $tag . '|$)/i';
		preg_match( $regV, $xml, $result );
		if ( !empty( $result ) )
			return $result[0];
		else
			return 0;

	}

}
