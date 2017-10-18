<?php
namespace KCH\Bundle\PCC3Bundle\Service;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Abstract class for pcc-3 transformers.
 *
 * @author DŁ
 */
class AbstractTransformer
{
    /**
     * @var Serializer $serializer
     */
    protected $serializer;

    /**
     * @var string $pcc3DeclarationClass
     */
    protected $pcc3DeclarationClass;

    /**
     * Constructor.
     *
     * @param string $pcc3DeclarationClass
     */
    public function __construct($pcc3DeclarationClass)
    {
        $this->pcc3DeclarationClass = $pcc3DeclarationClass;

        $serializerBuilder = SerializerBuilder::create();

        $serializerBuilder->addMetadataDir($this->getPcc3DeclarationMetadataPath(), $this->getPcc3DeclarationNamespace());

        $serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry) use ($serializerBuilder) {
            $serializerBuilder->addDefaultHandlers();
            $handlerRegistry->registerSubscribingHandler(new BaseTypesHandler());
            $handlerRegistry->registerSubscribingHandler(new XmlSchemaDateHandler());
        });

        $this->serializer = $serializerBuilder->build();
    }

    /**
     * Returns SplFileInfo object of declaration class.
     *
     * @param $pcc3DeclarationClass
     *
     * @author DŁ
     * @return \SplFileInfo
     */
    private function getPcc3DeclarationClassFileinfo($pcc3DeclarationClass)
    {
        return new \SplFileInfo((new \ReflectionClass($pcc3DeclarationClass))->getFileName());
    }

    /**
     * Get declaration metadata directory path.
     *
     * @author DŁ
     * @return string
     */
    private function getPcc3DeclarationMetadataPath()
    {
        $fileinfo = $this->getPcc3DeclarationClassFileinfo($this->pcc3DeclarationClass);
        return $fileinfo->getPath().DIRECTORY_SEPARATOR."metadata";
    }

    /**
     * Get declaration class namespace.
     *
     * @author DŁ
     * @return string
     */
    private function getPcc3DeclarationNamespace()
    {
        return (new \ReflectionClass($this->pcc3DeclarationClass))->getNamespaceName();
    }
}