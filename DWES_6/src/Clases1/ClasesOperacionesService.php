<?php

namespace Clases1;

class ClasesOperacionesService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
);

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'C:\xampp\htdocs\DWES_6\public/../servidorSoap/servicio.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param int $codigo
     * @return float
     */
    public function getPVP($codigo)
    {
      return $this->__soapCall('getPVP', array($codigo));
    }

    /**
     * @param int $producto
     * @param int $tienda
     * @return int
     */
    public function getStock($producto, $tienda)
    {
      return $this->__soapCall('getStock', array($producto, $tienda));
    }

    /**
     * @return Array
     */
    public function getFamilias()
    {
      return $this->__soapCall('getFamilias', array());
    }

    /**
     * @param string $codFamilia
     * @return Array
     */
    public function getProductosFamilia($codFamilia)
    {
      return $this->__soapCall('getProductosFamilia', array($codFamilia));
    }

}
