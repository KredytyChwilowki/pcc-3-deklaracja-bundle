<?php

namespace KCH\Bundle\PCC3Bundle\Service;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;

class Php2XmlConverter
{
    public function convert()
    {
        $serializerBuilder = SerializerBuilder::create();
        $serializerBuilder->addMetadataDir('PCC3\metadata', 'KCH\PCC3'); # ścieżka do katalogu z metadata oraz NameSpace
        $serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry) use ($serializerBuilder) {
            $serializerBuilder->addDefaultHandlers();
            $handlerRegistry->registerSubscribingHandler(new BaseTypesHandler());
            $handlerRegistry->registerSubscribingHandler(new XmlSchemaDateHandler());
        });

        $serializerBuilder = $serializerBuilder->build();
        $deklaracja = $serializerBuilder->deserialize('......xml deklaracji......', 'KCH\PCC3\Deklaracja', 'xml');
        return $serializerBuilder->serialize($deklaracja, 'xml');
    }
}