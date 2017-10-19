<?php

namespace KCH\Bundle\PCC3Bundle\Service;

use KCH\PCC3\Deklaracja;

/**
 * Class transform XML string to KCH\PCC3\Deklaracja object.
 *
 * @author DŁ
 */
class XmlToDeclarationTransformer extends AbstractTransformer
{
    /**
     * Transform method XML to KCH\PCC3\Deklaracja object.
     *
     * @param string $xml Xml declaration string
     *
     * @author DŁ
     * @return Deklaracja
     */
    public function transform($xml)
    {
        return $this->serializer->deserialize($xml, $this->pcc3DeclarationClass, 'xml');
    }
}