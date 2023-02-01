<?php

namespace Nasajon\AppBundle\NsjMail\Fila;

use Bernard\Envelope;
use Bernard\Serializer as SerializerBernard;
use JMS\Serializer\SerializerInterface;
use Normalt\Normalizer\AggregateNormalizer;

class Serializer extends SerializerBernard {
  protected $aggregate;
  protected $serializer;
  /**
   * @param AggregateNormalizer $aggregate
   * @param SerializerInterface $serializer
   */
  public function __construct(AggregateNormalizer $aggregate, SerializerInterface $serializer) {        
    parent::__construct($aggregate);    
    $this->serializer = $serializer;     
  }
  /**
   * {@inheritdoc}
   */
  public function serialize(Envelope $envelope) {    
    return $this->serializer->serialize($envelope, 'json');
  }
  /**
   * @param string $jsonData
   *
   * @return Nasajon\AppBundle\NsjMail\Fila\Bernard\Envelope
   */
  public function unserialize($jsonData) {    
    return $this->serializer->deserialize($jsonData, 'Nasajon\AppBundle\NsjMail\Fila\Bernard\Envelope', 'json');        
  }
} 